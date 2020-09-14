<!--------------------------------------- form2 -------------------------------------------->
<div class="second-form">
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="Scholarship name" class="popup__label-style"
                    >{{$scholarship->title_en}}{{__('messages.scholarship')}}</label
                >

            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="disred-speci" class="popup__label-style"
                    >{{__('messages.desire_specialize')}}</label
                >
                <textarea
                    id="disred-speci"
                    name="specialization"
                    rows="6"
                    cols="40"
                    class="input-message"
                    placeholder="{{__('messages.answer')}}"
                ></textarea>
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="disred-uni" class="popup__label-style"
                    >{{__('messages.desire_university')}}</label
                >
                <textarea
                    id="disred-uni"
                    name="university"
                    rows="6"
                    cols="40"
                    class="input-message"
                    placeholder="{{__('messages.answer')}}"
                ></textarea>
            </div>
            <div class="input u-margin-bottom-xsmall u-margin-right-large">
                <label for="interview-location" class="popup__label-style"
                    >{{__('messages.interview_location')}}</label
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
                    {{__('messages.background_pic')}}
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
                    {{__('messages.passport_picture')}}
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
                        {{__('messages.recomendation')}}


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
                    {{__('messages.high_school')}}
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
                    {{__('messages.university')}}
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
                    {{__('messages.bechelor_degree')}}
                        <input type="file" name="language_picture">

                    </h3>
                </div>
            </div>
            <a type="button" class="continue-btn  hide-form2">{{__('messages.continue')}}</a>
        </div>

        <!--------------------------------------- form3 -------------------------------------------->
        <div class="third-form">
            <div class="input">
                <label for="research-overview" class="popup__label-style"
                    >
                    {{__('messages.brief_overview')}}
                    </label
                >
                <textarea
                    id="research-overview"
                    name="research"
                    rows="6"
                    cols="60"
                    class="input-message"
                    placeholder="{{__('messages.answer')}}"
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
                    {{__('messages.proof_payment')}}
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
            <input  type="submit" class="continue-btn " value="{{__('messages.apply')}}" >
        </div>
