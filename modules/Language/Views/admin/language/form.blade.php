<div class="form-group">
    <label>{{__("Địa phương")}}</label>
    <div>
        <select name="locale" class="form-control dungdt-select2-field dungdt_input_locale" data-options='{"allowClear":true}' data-id="{{$row->id}}">
            <option value="">{{__("-- Vui lòng chọn --")}}</option>
            @foreach($locales as $locale => $name)
                <option data-name="{{$name}}" @if($row->locale == $locale) selected @endif value="{{$locale}}">{{$name}} - ({{$locale}})</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>{{__("Biểu tượng cờ")}}</label>
    <div class="input-group mb-3">
        <input type="text" value="{{$row->flag}}" placeholder="{{__("Eg: vn")}}" name="flag" class="form-control dungdt-input-flag-icon" required>
        <div class="input-group-append">
            <span class="input-group-text"><span class="flag-icon  flag-icon-{{$row->flag}}"></span></span>
        </div>

        <div class="invalid-feedback">
            {{__('Vui lòng nhập mã cờ')}}
        </div>
    </div>
</div>
<div class="form-group">
    <label>{{__("Tên")}}</label>
    <input type="text" value="{{$row->name}}" placeholder="{{__("Tên hiển thị")}}" name="name" class="form-control" required>
    <div class="invalid-feedback">
        {{__('Vui lòng nhập tên ngôn ngữ')}}
    </div>
</div>
<div class="form-group">
    <label>{{__("Trạng thái")}}</label>
    <div class="">
        <label>
            <input type="radio" @if(!$row->status or $row->status == 'publish') checked @endif name="status" value="publish"> {{__('Công bố')}}
        </label>
    </div>
    <div>
        <label>
            <input type="radio" @if($row->status == 'draft') checked @endif name="status" value="draft"> {{__('Nháp')}}
        </label>
    </div>
</div>
