@php
$navlist = App\Models\Navlist::orderBy('id', 'ASC')->get();
@endphp

<div class="col-20">
    @foreach($navlist as $navlist)
    <div class="tab-links">
        <div class="card">
            @foreach
            <div class="card-heading">
                <span class="toggle"><i class="fas fa-bars"></i></span>
                <span class="menu">{{$category[0]->category_name}}</span>
            </div>
            <div class="card-body">
                <button class="tab-btn active" data-id="tab-1">
                    Human Hair
                </button>
                <button class="tab-btn" data-id="tab-2">Bone Straight</button>
                <button class="tab-btn" data-id="tab-3">
                    Human-hair Blend
                </button>
                <button class="tab-btn" data-id="tab-4">
                    Curly Bouncing Hair
                </button>
                <button class="tab-btn" data-id="tab-5">Short Hair</button>
                <button class="tab-btn" data-id="tab-6">Luxury Hair</button>
            </div>
        </div>
    </div>
    endforeach
</div>