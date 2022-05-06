<div class="footer">
  {{-- <div class="bg-vnu-gray" style="font-size: 12px">
    <div class="container px-2 py-3">
      <div class="row mr-0">
        @foreach ($categoriesFooter as $category)
          <div class="col-lg-3 col-md-6 col-sm-6 mb-3">
            <ul class="px-0">
              <li class="mb-1"><strong style="font-size: 13px"><a class="text-dark" href="{{ route('categories.show', $category["id"]) }}">{{ $category['name'] }}</a></strong></li>
              @foreach ($category['categories'] as $subCategory)
                <li class="mb-1"><a class="text-dark" href="{{ route('categories.show', ['parent_id' => $category["id"], 'child_id' => $subCategory["id"]]) }}">{{ $subCategory['name'] }}</a></li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>
      <div class="row mr-0">
        <div class="col-lg-9 col-md-6 col-sm-6 mb-3"></div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a class="mr-2" href=""><img src="{{ url('images/facebook.jpg') }}" style="height: 40px"></a>
          <a class="mr-2" href=""><img src="{{ url('images/youtube.png') }}" style="height: 40px"></a>
          <a class="mr-2" href=""><img src="{{ url('images/gmail.png') }}" style="height: 40px"></a>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="bg-vnu-blue" style="font-size: 12px">
    <div class="container px-2 py-3 text-right text-white">
      <ul class="px-0" style="list-style-type: none">
        <li class="mb-1 text-uppercase">Công ty cổ phần giáo dục tâm phước</li>
        <li class="mb-1">MST: 2500662534</li>
        <li class="mb-1">Hotline: 024 7777 8998</li>
        <li class="mb-1">Email: bksteamacademy@gmail.com</li>
        <li class="mb-1">Trụ sở chính: Khu phố 1, thị trấn Hương Canh, huyện Bình Xuyên, tỉnh Vĩnh Phúc</li>
      </ul>
    </div>
  </div>
</div>