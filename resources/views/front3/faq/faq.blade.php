<section id="faq" class="faq">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>سوالات پرتکرار</h3>
            <p>در زیر لیستی از سوالات پر تکرار را مشهاده خواهید کرد</p>
        </header>

        <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">
            @php
            $i=1;
            @endphp
            @foreach($faqs as $faq)
            <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{$i}}">{{$faq->question}} <i
                        class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq{{$i}}" class="collapse" data-bs-parent=".faq-list">
                    <p>
                        {{$faq->answer}}
                    </p>
                </div>
            </li>
            @php
            $i++;
            @endphp
            @endforeach
        </ul>
    </div>
</section>