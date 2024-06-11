<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Gallerycategory;
use Exception;
use App\Models\Day;
use App\Models\Favorite;
use App\Models\Service;
use App\Models\Comment;
use App\Models\Score;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Turn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Morilog\Jalali\Jalalian;
use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $services = Service::paginate(4);
        $services = $this->diterminateFavoriteService($services);
        return view('front3.search.search', compact('services'));
    }
    public function diterminateFavoriteService($services)
    {
        $user_services = Auth::user()->favorites()->get();
        foreach ($services as $service) {
            $service_id = $service->id;
            $service['active'] = 0;
            foreach ($user_services as $row) {
                if ($service_id == $row->service_id) {
                    $service['active'] = 1;
                }
            }
        }
        return $services;
    }
    public function doSearch(Request $request)
    {
        $keyword = $request->keyword;
        return redirect(Route('display.search'))->with('keyword', $keyword);
    }

    function displaySearch(Request $request)
    {
        $keyword = $request->session()->get('keyword');
        try {
            $services = Service::where('title', 'like', $keyword . '%')->paginate(4);
            $services = $this->diterminateFavoriteService($services);
            if(count($services)>0) {
                return view('front3.search.search', compact('services', 'keyword'));
            }
            else{
                throw new Exception('موردی یافت نشد');
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('warning', $exception->getMessage());
        }
    }
    public function showServiceDetail(Service $service)
    {
        $x = Gallery::where('service_id', $service->id)->get();
        // dd($x->unique('category_id')->pluck('category_id'));
        // echo Jalalian::forge('today');
        $categories = $x->unique('category_id')->pluck('category_id');
        $allCategories = $this->getAllCategories($categories);
        $galleryImages = $this->getGallery($categories);
        $comments = $service->comments()->get();
        // dd($galleryImages);
        $this_week_days = $this->getThistWeek($service->id, Jalalian::forge('today'));
        $today = Jalalian::forge('today')->format('Y/m/d');
        $days = $this_week_days[0];
        $friday = $this_week_days[1];
        $friday = $friday->format('Y/m/d');
        $address = $service->address()->first();
        return view('front3.search.service-detail', compact('days', 'service', 'address', 'allCategories', 'galleryImages', 'comments', 'friday', 'today'));

    }
    public function addToFavorits(Request $request)
    {
        $is_set_favorite = Favorite::where('user_id', $request->user_id)->where('service_id', $request->service_id)->first();
        if ($is_set_favorite) {
            Favorite::destroy($is_set_favorite->id);
            return response()->json('ok', 200);
        } else {
            $favorite = new Favorite();
            $favorite = $favorite->create($request->all());
            return response()->json($favorite->id, 200);
        }
    }
    public function getGallery($categories)
    {
        $gallery = [];
        foreach ($categories as $category) {
            $categoryImages = $this->getCategoryImages($category);
            array_push($gallery, $categoryImages);
        }
        return $gallery;
    }
    public function getCategoryImages($category_id)
    {
        return Gallery::where('category_id', $category_id)->get();
    }
    public function getAllCategories($categories)
    {
        $allCategoryNames = [];
        foreach ($categories as $category) {
            $categoryName = $this->getCategory($category);
            array_push($allCategoryNames, $categoryName);
        }
        return $allCategoryNames;
    }
    public function getCategory($category_id)
    {
        return $category['$category'] = Gallerycategory::where('id', $category_id)->first();

    }
    public function showNextWeek(Request $request)
    {
        // dd('hello');
        $service_id = $request->service_id;
        $endTime = $request->endTime;
        $date = parent::exploadDateFormat($endTime);
        $date = (new Jalalian($date[0], $date[1], $date[2]));
        $this_week_days = $this->getNextWeek($service_id, $date, $endTime);
        $days = $this_week_days[0];
        $friday = $this_week_days[1]->format('Y/m/d');
        $sunday = $date->addDays(1)->format('Y/m/d');
        $sizeOfDays = count($days);
        return response()->json([$days, $friday, $sunday, $sizeOfDays], 200);
        // if(count($days)==0){
        //     return response()->json(0,200);
        // }else{
        //     return response()->json([$days,$friday,$sunday],200);
        // }
        // return $days;
        // if(count(array_keys($days))==1 && key($days)=='no day1'){
        //     return response()->json(0,200);

        // }else{
        //     return response()->json($days,200);
        // }


    }
    public function showPreviouseWeek(Request $request)
    {
        $service_id = $request->service_id;
        $startTime = $request->startTime;
        $date = parent::exploadDateFormat($startTime);
        $date = (new Jalalian($date[0], $date[1], $date[2]));
        $days_of_week = $this->getPreviouseWeek($service_id, $date, $startTime);
        $days = $days_of_week[0];
        $sunday = $days_of_week[1]->format('Y/m/d');
        $stop = $days_of_week[2];
        $friday = $date->subDays(1)->format('Y/m/d');
        $days = array_reverse($days);
        return response()->json([$days, $friday, $sunday, $stop], 200);




    }
    public function getThistWeek($service_id, $currentTime)
    {
        $days = [];
        $day_number = 0;
        $friday = Jalalian::forge('friday');
        while ($currentTime <= $friday) {
            $dateTime = $currentTime->format('Y/m/d');
            $turn = $this->getTurn($service_id, $dateTime);
            if (count($turn) == 0) {
                $dayName = $this->getDayName($day_number + 1);
                $days[$dayName->day] = [];
            } else {
                $dayName = $this->getDayName($turn[0]->day_id);
                $days[$dayName->day] = $turn;
                $day_number = $turn[0]->day_id;
            }

            $currentTime = $currentTime->addDays(1);
        }
        return [$days, $friday];
    }
    public function getNextWeek($service_id, $currentTime, $currentTimeFormat)
    {
        $date = parent::exploadDateFormat($currentTimeFormat);
        $endTime = (new Jalalian($date[0], $date[1], $date[2]))->addDays(7);
        $days = [];
        $day_number = 0;
        $sizeOfDays = 0;
        while ($currentTime < $endTime) {//باید با حلقه ی while چک شود
            $currentTime = $currentTime->addDays(1);
            $dateTime = $currentTime->format('Y/m/d');
            $turn = $this->getTurn($service_id, $dateTime);
            if (count($turn) == 0) {
                $dayName = $this->getDayName($day_number + 1);
                $days[$dayName->day] = [];
            } else {
                $dayName = $this->getDayName($turn[0]->day_id);
                $days[$dayName->day] = $turn;
                $day_number = $turn[0]->day_id;
            }
        }
        return [$days, $endTime];
    }
    public function getPreviouseWeek($service_id, $currentTime, $currentTimeFormat)
    {
        $date = parent::exploadDateFormat($currentTimeFormat);
        $startTime = (new Jalalian($date[0], $date[1], $date[2]))->subDays(7);
        $days = [];
        $day_number = 0;
        $stop = '';
        while ($startTime < $currentTime) {//باید با حلقه ی while چک شود
            $currentTime = $currentTime->subDays(1);
            if ($currentTime < (Jalalian::forge('today'))) {
                $startTime = $currentTime->addDays(1);
                $stop = 'stop';
                break;
            }
            $dateTime = $currentTime->format('Y/m/d');
            $turn = $this->getTurn($service_id, $dateTime);

            if (count($turn) == 0) {
                $dayName = $this->getDayName($day_number - 1);
                $days[$dayName->day] = [];
            } else {
                $dayName = $this->getDayName($turn[0]->day_id);
                $days[$dayName->day] = $turn;
                $day_number = $turn[0]->day_id;
            }
        }

        return [$days, $startTime, $stop];
    }

    public function getTurn($service_id, $dateTime)
    {
        $turn = Turn::where('date', '=', $dateTime)->where('service_id', '=', $service_id)->get();
        return $turn;
    }

    public function getDayName($dayId)
    {
        return Day::where('id', $dayId)->first();
    }
    // public function previouseWeek($currentTime)
    // {
    //     $days = [];
    //     $turns = 0;
    //     while ($currentTime <= new Carbon('last friday')) {
    //         $dateTime = $currentTime->format('Y-m-d');
    //         $date = Turn::where('date', '=', $dateTime)->get();
    //         $dayName = $this->getDayName($date[0]->day_id);
    //         $days[$dayName->day] = $date;
    //         $currentTime = $currentTime->subDays(1);
    //     }
    //     return $days;
    // }
    public function getTurnAtDay($date)
    {
        $day = [];
        $turns = Turn::where('date', $date)->first();
        return $turns;
    }


    public function bookTurn(Request $request, Turn $turn, $id)
    {
        $turn->user_id = $id;
        $turn->active = 1;
        $turn->save();
        $turnDetail = $turnDetail = Turn::where('id', $turn->id)->first();
        $date = parent::getDateTimeJalali($turnDetail->date);
        $user = User::where('id', $turnDetail->user_id)->first();
        $service = Service::where('id', $turn->service_id)->first();
        return view('front3.search.turn-detail', compact('turnDetail', 'user', 'service', 'date'));
    }
    public function Favorits(Request $request)
    {
        $favorite = new Favorite();
        $favorite = $favorite->create($request->all());
        return response()->json($favorite->id, 200);
    }
    public function addComment(Request $request)
    {
        $validation = $request->validate([
            'body' => 'required',
        ]);
        $service_id = $request->service_id;
        $user_id = $request->user_id;
        $body = $request->body;
        $score = $request->score;
        $user_id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        if ($request->score == null) {
            $score = 0;
        }
        try {
            $comment = Comment::create(['service_id' => $service_id, 'user_id' => $user_id, 'name' => $name, 'email' => $email, 'body' => $body]);
            Score::create(['comment_id' => $comment->id, 'service_id' => $service_id, 'score' => $score]);
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('warning', $e->getMessage());
        }
        $msg = 'نظر شما با موفقیت ثبت شد و پس از بررسی یه نمایش در خواهد آمد';
        return redirect()->back()->with('success', $msg);
    }
}