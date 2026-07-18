@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row align-items-center g-5">
                    @if (Auth::user()->role == 'auther')
                        <h1>You're already Auther</h1>
                    @else
                        <form action="{{route('promote#Process')}}" method="post">
                            @csrf
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            @error('userId')
                                <h6 class="text-danger mt-2 mb-2">{{ $message }}</h6>
                            @enderror
                            <div class=" col-12 card mb-3">
                                <div class="card-title mt-3 ms-3 fw-bold fs-large">
                                    Rule - 1
                                </div>
                                <div class="card-body">
                                    <div class=" col form-check mb-3">
                                        <p>တင်ပြမည့် အကြောင်းအရာများသည် ကျိုးကြောင်းဆီလျော်၍ ခိုင်မာသော တင်ပြချက်များ ဖြစ်ရပါမည်။ ပညာရပ်ဆိုင်ရာနှင့် လုပ်ငန်းခွင်ဆိုင်ရာ ဂုဏ်သိက္ခာကို ထိန်းသိမ်းရန်အတွက် လိုအပ်သည့်နေရာများတွင် ကိုးကားချက် (References & Citations) များကို လိုအပ်သလို ထည့်သွင်းဖော်ပြရပါမည်။</p>
                                        <input class="form-check-input" name="check1" type="checkbox" id="terms">

                                        <label class="form-check-label" for="terms">
                                            I agree to the Terms & Conditions
                                        </label> <br>
                                        @error('check1')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 card mb-3">
                                <div class="card-title mt-3 ms-3 fw-bold fs-large">
                                    Rule - 2
                                </div>
                                <div class="card-body">
                                    <div class=" col form-check mb-3">
                                        <p>အကြောင်းအရာများသည် လုပ်ငန်းခွင်စံနှုန်းများကို တိကျစွာ လိုက်နာရပါမည်။ မည်သည့် ခွဲခြားဆက်ဆံမှု (လူမျိုး၊ ကျား/မ၊ သို့မဟုတ် ဘာသာရေးကိုးကွယ်မှု အပါအဝင်)၊ နိုင်ငံရေးအမြင်များ၊ ရိုင်းစိုင်းသော စကားလုံးများနှင့် ဗန်းစကားများ အသုံးပြုခြင်းကို လုံးဝ (လုံးဝ) ခွင့်ပြုမည်မဟုတ်ပါ။</p>
                                        <input class="form-check-input" name="check2" type="checkbox" id="terms">

                                        <label class="form-check-label" for="terms">
                                            I agree to the Terms & Conditions
                                        </label> <br>
                                        @error('check2')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 card mb-3">
                                <div class="card-title mt-3 ms-3 fw-bold fs-large">
                                    Rule - 3
                                </div>
                                <div class="card-body">
                                    <div class=" col form-check mb-3">
                                        <p>ဖြန့်ဝေမည့် အကြောင်းအရာအားလုံးသည် အသိပညာပေးရန်၊ သတင်းအချက်အလက် မျှဝေရန်နှင့် လူ့အဖွဲ့အစည်းအတွက် အကျိုးဖြစ်ထွန်းစေသော၊ လေ့လာသင်ယူမှုကို ဦးတည်သော ရည်ရွယ်ချက် ရှိရပါမည်။</p>
                                        <input class="form-check-input" name="check3" type="checkbox" id="terms">

                                        <label class="form-check-label" for="terms">
                                            I agree to the Terms & Conditions
                                        </label>
                                        <br>
                                        @error('check3')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class=" col-12 card mb-3">
                                <div class="card-title mt-3 ms-3 fw-bold fs-large">
                                    REMINDERS
                                </div>
                                <div class="card-body">
                                    <div class=" col form-check mb-3">
                                        <ol>
                                            <ul>
                                                <li>စာရေးသူ (Author) အဆင့်အတန်းသို့တိုးမြင့် ပေးအပ်ခြင်း၊ ပယ်ဖျက်ခြင်းနှင့် စပ်လျဉ်း၍ စီမံခန့်ခွဲမှုအဖွဲ့ (Admin Team) ၏ ဆုံးဖြတ်ချက်သာ အတည်ဖြစ်သည်။ ခိုင်လုံသော အကြောင်းပြချက်ရှိပါက စီမံခန့်ခွဲမှုအဖွဲ့သည် စာရေးသူအဆင့်အတန်းကို မည်သည့်အချိန်တွင်မဆို ပြန်လည်ရုပ်သိမ်းပိုင်ခွင့်ရှိသည်။</li>
                                                <li>အင်္ဂလိပ်ဘာသာစကား၊ မြန်မာဘာသာစကား သို့မဟုတ် ၎င်းဘာသာစကားနှစ်မျိုးစလုံးကို ပူးတွဲအသုံးပြုထားသည့် တင်ပြချက်များကိုသာ ကနဦးအနေဖြင့် လက်ခံပါမည်။ (နောင်တွင် အခြားဘာသာစကားအသုံးပြု တင်ပြမှုများကို တိုးချဲ့လက်ခံသွားနိုင်ခြင်းမျိုး ရှိနိုင်ပါသည်။)</li>
                                            </ul>
                                        </ol>
                                        <input class="form-check-input" name="check4" type="checkbox" id="terms">

                                        <label class="form-check-label" for="terms">
                                            I acknowledge
                                        </label> <br>
                                        @error('check4')
                                            <small class="text-danger mt-2">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card col-12 mt-3">
                                <div class="card-body justify-content-center">
                                    <label for="" class='fw-bold d-flex justify-content-center'>Please confirm below if you agree all terms and conditions above.</label>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn btn-outline-primary ">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>


    </main>
@endsection
