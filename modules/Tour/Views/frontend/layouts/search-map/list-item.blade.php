<div class="bravo-list-item @if(!$rows->count()) not-found @endif">
    @if($rows->count())
        <div class="text-paginate">
            <span class="count-string">{{ __("Hiển thị :from - :to của :total Chuyển đi",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
        </div>
        <div class="list-item">
            <div class="row">
                @foreach($rows as $row)
                    <div class="col-lg-4 col-md-6">
                        @include('Tour::frontend.layouts.search.loop-gird')
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bravo-pagination">
            {{$rows->appends(array_merge(request()->query(),['_ajax'=>1]))->links()}}
        </div>
    @else
        <div class="not-found-box">
            <h3 class="n-title">{{__("Chúng tôi không thể tìm thấy bất kỳ chuyến nào của bạn.")}}</h3>
            <p class="p-desc">{{__("Thử lại thay đổi điều kiện lọc của bạn")}}</p>
            {{--<a href="#" onclick="return false;" click="" class="btn btn-danger">{{__("Dọn Bộ Lọc")}}</a>--}}
        </div>
    @endif
</div>
