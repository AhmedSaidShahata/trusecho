@extends('user.layouts.fixed_layout')
@section('content')
<div class="apply-container-bg" style="height: auto;">
    <div class="apply-illustration-box">
        <img
            src="img/apply-throug-truescho-1.svg"
            alt="illustration"
            class="apply-illustration"
        />
    </div>
    <h1 class="apply__header">Apply through truescho</h1>
    <div class="apply-underline"></div>
    appscholars
    <form method="POST" action="{{route('user.appscholars.store')}}" enctype="multipart/form-data">
    @csrf
        <!--------------------------------------- form1 -------------------------------------------->
        <div class="apply-content-box first-form">
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="Scholarship name" class="popup__label-style"
                    >{{$scholarship->title_en}} Scholarship </label
                >
                <input
                    hidden
                    type="text"
                    name="scholar_id"
                    value="{{$scholarship->id}}"
                    class="popup__input-style"
                    placeholder="Scholarship name..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="ad-post-title" class="popup__label-style"
                    >Full name</label
                >
                <input
                    type="text"
                    id="ad-post-title"
                    name="fullname"
                    class="popup__input-style"
                    placeholder="Full name..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="fullname" class="popup__label-style"
                    >Nationality</label
                >
                <input
                    type="text"
                    id="fullname"
                    name="nationality"
                    class="popup__input-style"
                    placeholder="Nationality..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="email" class="popup__label-style">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="popup__input-style"
                    placeholder="Email..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="phone-number" class="popup__label-style"
                    >Phone number</label
                >
                <input
                    type="text"
                    id="phone-number"
                    name="phone"
                    class="popup__input-style"
                    placeholder="Phone number..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="residential-address" class="popup__label-style"
                    >Residential Address</label
                >
                <input
                    type="text"
                    id="residential-address"
                    name="address"
                    class="popup__input-style"
                    placeholder="Add post address..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="father-status" class="popup__label-style"
                    >is the FATHER still alive? if yes, what does he
                    work?</label
                >
                <input
                    type="text"
                    id="father-status"
                    name="father_status"
                    class="popup__input-style"
                    placeholder="Answer..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="mother-status" class="popup__label-style"
                    >is the MOTHER still alive? if yes, what does he
                    work?</label
                >
                <input
                    type="text"
                    id="mother_status"
                    name="mother_status"
                    class="popup__input-style"
                    placeholder="Answer..."
                />
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="siblings-number" class="popup__label-style"
                    >HOW MANY SIBLINGS DO YOU HAVE?</label
                >
                <input
                    type="number"
                    id="siblings-number"
                    name="siblings_count"
                    class="popup__input-style"
                    placeholder="Please enter the number of your siblings..."
                />
            </div>
            <div
                class="input u-margin-bottom-xsmall u-margin-right-large flex-coloum"
            >
                <label for="scientifc-degree" class="popup__label-style"
                    >WHAT IS THE SCIENTIFIC DEGREE THAT YOU ARE APPLYING
                    FOR?</label
                >
                <button type="button"  class="scientific-selection degree" >Bachelor Degree</button>
                <button type="button"  class="scientific-selection degree">Masters Degree</button>
                <button type="button"  class="scientific-selection degree">Phd Degree</button>
                <input type="hidden" name="degree"  value="">
            </div>
            <a type="button" class="continue-btn hide-form1" style="width: auto;">Press to continue</a>
        </div>
        <!--------------------------------------- form2 -------------------------------------------->
        <div class="second-form">
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="Scholarship name" class="popup__label-style"
                    >{{$scholarship->title_en}}Scholarship</label
                >

            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="disred-speci" class="popup__label-style"
                    >desired specialization according to the importance</label
                >
                <textarea
                    id="disred-speci"
                    name="specialization"
                    rows="6"
                    cols="40"
                    class="input-message"
                    placeholder="Your desired Specification ...."
                ></textarea>
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="disred-uni" class="popup__label-style"
                    >desired universities according to the importance
                    (optional)</label
                >
                <textarea
                    id="disred-uni"
                    name="university"
                    rows="6"
                    cols="40"
                    class="input-message"
                    placeholder="Your desired University ...."
                ></textarea>
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="interview-location" class="popup__label-style"
                    >prefered interview location</label
                >
                <input
                    type="text"
                    id="interview-location"

                    name="interview_location"
                    class="popup__input-style"
                    placeholder="Interview location..."
                />
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        add a picture with a white background
                        <input type="file" name="user_picture">
                    </h3>
                </div>
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        Passport picture
                        <input type="file" name="passport_picture">
                    </h3>
                </div>
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        Recommendation Letter


                        <input type="file" name="letter_picture">

                    </h3>
                </div>
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        High school Transcription
                        <input type="file" name="high_school_picture">
                    </h3>
                </div>
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        University Degree (Optional)
                        <input type="file" name="university_picture">
                    </h3>
                </div>
            </div>
            <div class="upload-file">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        Language Certificates (If possilbe)
                        <input type="file" name="language_picture">

                    </h3>
                </div>
            </div>
            <a type="button" class="continue-btn  hide-form2">Press to continue</a>
        </div>

        <!--------------------------------------- form3 -------------------------------------------->
        <div class="third-form">
            <div class="input">
                <label for="research-overview" class="popup__label-style"
                    >The title of the research and a brief overview of it for
                    those wishing to apply for postgraduate studies
                    (Optional)</label
                >
                <textarea
                    id="research-overview"
                    name="research"
                    rows="6"
                    cols="60"
                    class="input-message"
                    placeholder="Research overview ...."
                >
                </textarea>
            </div>
            <div class="upload-file size-edit">
                <div class="upload-file__title-box">
                    <img
                        src="img/adding icon.svg"
                        alt="add icon"
                        class="upload-file-icon"
                    />
                    <h3 class="upload-file__title">
                        A proof of payment
                        <input type="file" name="payment_picture">

                    </h3>
                </div>
            </div>
            <!-- <div class="input u-margin-bottom-xsmall">
                <input
                type="checkbox"
                    id="agree"
                    name="agree"
                    value="agree"
                    class="input-checkbox"
                />
                <label for="vehicle1" class="popup__label-style ">
                    I have carefully read all the information that contains all
                    the details of the application through the Truescho group
                    and agree to it</label
                >
            </div> -->
            <input  type="submit" class="continue-btn " value="Apply" >
        </div>

    </form>
</div>
@endsection
