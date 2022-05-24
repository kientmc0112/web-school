<div class="contact">
  <h2 class="text-center text-uppercase" style="font-size: 30px; font-weight: bold; padding-bottom: 35px; color: #f53b57">ĐĂNG KÝ NHẬN TƯ VẤN<br>LỘ TRÌNH HỌC MIỄN PHÍ</h2>
  <div style="width: 900px; max-width: 100%; margin: 0 auto; padding: 0 20px">
    <div class="row">
      <div class="col-md-7 col-sm-12">
        <form action="{{ route('contacts.store') }}" method="POST">
          @csrf
          <input placeholder="{{ trans('label.name') }} *" class="form-input" type="text" name="name" />
          <input placeholder="{{ trans('label.telephone') }} *" class="form-input" type="tel" name="telephone" />
          <input placeholder="{{ trans('label.date_of_birth') }} *" class="form-input" type="text" name="date_of_birth" onfocus="(this.type='date')" onfocusout="(this.type=!this.value ? 'text' : this.type)" />
          <input placeholder="{{ trans('label.email') }} *" class="form-input" type="email" name="email" />
          @if ($errors->any())
            <div class="text-danger" style="font-size: 14px; padding-left: 20px; margin-bottom: 20px;">
              {{ $errors->first() }}
            </div>
          @endif
          <div class="text-right">
            <button class="form-submit" type="submit">{{ trans('label.send_info') }}</button>
          </div>
        </form>
      </div>
      <div class="col-md-5 d-md-block d-none">
        <img src="{{ url('images/contact.png') }}" class="w-100" style="object-fit: contain; max-height: 305px;">
      </div>
    </div>
  </div>
</div>
<style>
  .contact {
    /* background-color: #d7d7d7; */
    /* background-color: white; */
    background-image: url({{url('images/contact-bg.png')}});
    background-position: center;
    padding: 35px 0;
  }
  .form-input {
    width: 100%;
    border: 1px solid #d7d7d7;
    height: 45px;
    border-radius: 25px;
    padding: 0px 20px;
    outline: none;
    background: #FFF;
    margin-bottom: 20px;
    font-size: 16px;
  }
  .form-submit {
    height: 45px;
    padding: 0px 40px;
    border-radius: 30px;
    background: #101e49;
    color: #FFF;
    display: inline-block;
    font-weight: bold;
    font-size: 16px;
    border: none;
  }
</style>