<div id="form-outer">
    <p id="description">
        Please fill in information about yourself (you can skip it)
    </p>
    <form id="survey-form" method="POST" action="/sendQuestionnaire">
        <div class="rowTab">
            <div class="labels">
                <label id="name-label" for="name"> Full name:</label>
            </div>
            <div class="rightTab">
                <input autofocus type="text" name="name" id="name" class="input-field" placeholder="Enter your name" required>
            </div>
            <!--Field creation for name -->
        </div>
        <div class="rowTab">
            <div class="labels">
                <label id="avatar-label" for="avatar"> Avatar url:</label>
            </div>
            <div class="rightTab">
                <input type="email" name="email" id="email" class="input-field" required placeholder="Enter url">
                <!--Field for email -->
            </div>
        </div>
        <!-- Free Text Area -->
        <div class="rowTab">
            <div class="labels">
                <label for="goal">Your goal</label>
            </div>
            <div class="rightTab">
                <textarea id="goal" class="input-field" style="height:50px;resize:vertical;" name="comment" placeholder="Describe your goal"></textarea>
            </div>
        </div>
        <div class="rowTab">
            <div class="labels">
                <label id="social1-label" for="social1">Social 1:</label>
            </div>
            <div class="rightTab">
                <input type="number" name="age" id="number" min="1" max="99" class="input-field" placeholder="Enter your url">
                <!--Field for Number -->
            </div>
        </div>
        <div class="rowTab">
            <div class="labels">
                <label="currentPos">Please select your gender:</label>
            </div>
            <div class="rightTab">
                <select id="dropdown" name="currentPos" class="dropdown">
                    <option disabled value>Select an option</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="rowTab">
            <div class="labels">
                <label for="userRating">Working hours:</label>
            </div>
            <!--Respostas Unicas! -->
            <div class="rightTab">
                <ul style="list-style: none;">
                    <li class="radio">
                        <label>Full Time<input name="radio-buttons" value="1" type="radio" class="userRatings">
                        </label>
                    </li>
                    <li class="radio"><label>Half Time<input name="radio-buttons" value="2" type="radio" class="userRatings"></label></li>
                    <li class="radio"><label>Not Working<input name="radio-buttons" value="3" type="radio" class="userRatings"></label></li>
                </ul>
            </div>
        </div>
        <!--Single Option dropbar -->
        <div class="rowTab">
            <div class="labels">
                <label for="most-like">Do you enjoy your work</label>
            </div>
            <div class="rightTab">
                <select id="most-like" name="mostLike" class="dropdown">
                    <!--class estilo dropdown, id = label-->
                    <option disabled selected value>Select an option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>
        <!--Multiple Answers -->
        <div class="rowTab">
            <div class="labels">
                <label for="professions">Please select professions that you would like to apply:</label>
            </div>
            <div class="rightTab">
                <ul id="professions" style="list-style: none;">
                    <li class="checkbox">
                        <label>
                            <input name="option" value="1" type="checkbox" class="userRatings">Teacher
                        </label>
                    </li>
                    <li class="checkbox"><label>
                            <input name="option" value="2" type="checkbox" class="userRatings">Waiter
                        </label>
                    </li>

                    <li class="checkbox"><label><input name="option" value="3 " type="checkbox" class="userRatings">Programmer</label>
                    </li>
                    <li class="checkbox"><label><input name="option" value="4" type="checkbox" class="userRatings">Other</label>
                    </li>
                </ul>
            </div>
        </div>

        <button id="submit" type="submit">Submit</button>
    </form>
</div>

<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,500);

    #form-outer {
        background-color: rgb(250, 250, 250);
        margin: 0 auto;
        border-radius: 4px;
        width: 75%;
        max-width: 900px;
        padding: 10px;
        padding-top: 20px;
    }

    .labels {
        display: inline-block;
        text-align: right;
        width: 40%;
        padding: 5px;
        vertical-align: top;
        margin-top: 10px;
    }

    .rightTab {
        display: inline-block;
        text-align: left;
        width: 48%;
        vertical-align: middle;
    }

    .input-field {
        height: 20px;
        width: 280px;
        padding: 5px;
        margin: 10px;
        border: 1px solid #c0c0c0;
        border-radius: 2px;
    }

    #userAge {
        width: 40px;
    }

    .userRatings,
    input[type="checkbox"] {
        float: left;
        margin-right: 5px;
    }

    #submit {
        background-color: #59ace0;
        border-radius: 4px;
        color: white;
        font-size: 1em;
        height: 40px;
        width: 96px;
        margin: 10px;
        border: 0px solid;
    }

    .dropdown {
        height: 35px;
        width: 140px;
        padding: 5px;
        margin: 10px;
        margin-top: 15px;
        border: 1px solid #c0c0c0;
        border-radius: 2px;
    }

    .radio,
    .checkbox {
        position: relative;
        left: -43px;
        margin-left: 10px;
        display: block;
        padding-bottom: 10px;
    }

    @media screen and (max-width: 833px) {
        .input-field {
            width: 80%;
        }
        select {
            width: 90%;
        }
    }

    @media screen and (max-width: 520px) {
        .labels {
            width: 100%;
            text-align: left;
        }
        .rightTab {
            width: 80%;
            float: left;
        }
        .input-field {
            width: 100%;
        }
        select {
            width: 100%;
        }
    }

</style>
