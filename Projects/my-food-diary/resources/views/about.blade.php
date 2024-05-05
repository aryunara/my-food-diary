@extends('main_nav')
@section('main_content')

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <div class="main-page">
        <!---->
        @if(\App\Models\User::find($userId)->count())
            @php($user = \App\Models\User::find($userId))
        <div class="left">
            <div class="stripe-border"></div>
            <div class="main-box">
                <div class="main-sub-box-1">
                    <a onclick="" class="profile-pic"></a>
                </div>
                <div class="main-sub-box-2">
                    <h1 class="title main-title">HI, I'M {{ $user->username }}</h1>
                    <div class="paragraph">
                        @if(isset($user->userInfo->goal))
                            <p>{{ $user->userInfo->goal }}</p>
                        @else
                            <p>No information</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="right"></div>
    </div>

    <!-- ABOUT ME -->
    <div class="about-me sub-page" id="AB">
        <center>
            <h1 class="title">ABOUT ME</h1>
                <table class="info-box">
                    <tr>
                        <td><img class="work-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">MY NAME IS...</b>
                            <br><br>
                            @if(isset($user->userInfo->real_name))
                                <b>{{ $user->userInfo->real_name }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="info-box">
                    <tr>
                        <td><img class="work-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">MY PRONOUNS</b>
                            <br><br>
                            @if(isset($user->userInfo->pronouns))
                                <b>{{ $user->userInfo->pronouns }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="info-box">
                    <tr>
                        <td><img class="education-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">MY AGE</b>
                            <br><br>
                            @if(isset($user->userInfo->age))
                                <b>{{ $user->userInfo->age }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="info-box">
                    <tr>
                        <td><img class="work-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">I WORK AS A...</b>
                            <br><br>
                            @if(isset($user->userInfo->job))
                                <b>{{ $user->userInfo->job }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="info-box">
                    <tr>
                        <td><img class="work-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">MY FAVORITE FOOD</b>
                            <br><br>
                            @if(isset($user->userInfo->favorite_food))
                                <b>{{ $user->userInfo->favorite_food }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
                <table class="info-box">
                    <tr>
                        <td><img class="work-icon ab-icon" </td>
                        <td class="paragraph"><b class="grey-title">MY LEAST FAVORITE FOOD</b>
                            <br><br>
                            @if(isset($user->userInfo->least_favorite_food))
                                <b>{{ $user->userInfo->least_favorite_food }}</b>
                            @else
                                <b>No information</b>
                            @endif
                        </td>
                    </tr>
                </table>
        </center>
    </div>
    @endif
@endsection

<style>
    @import url('https://fonts.googleapis.com/css?family=Ek+Mukta|Roboto|Open Sans:Light');
    ::-webkit-scrollbar {
        display: none;
    }
    body{
        overflow-x: hidden;
        font-size: 16px;
        background-color: #fafafa;
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
    }

    /*MAIN PAGE*/
    .main-page {
        display: flex; /* Используем flexbox */
        justify-content: center; /* Выравниваем по горизонтали */
        align-items: center; /* Выравниваем по вертикали */
        width: 100vw;
        height: 100vh;
        max-height: 300px;
        overflow: visible;
        border: none;
        background-color: #fafafa;
    }
    .left {
        display: inline-block;
        top: 50px;
        left: 0px;
        width: 60vw;
        height: 100%;
        max-height: 800px;
        background-color: #fafafa;
    }
    .right {
        position: absolute;
        height: 100%;
        top: 0px;
        width: 40vw;
        max-height: 800px;
        right: 0px;
        background-image: url("https://lh3.googleusercontent.com/v6A92aA8Z3rT5DC5BvtPCJv1NemanEVjSoz-OqTuo6c9ve6DkSaSqQw6SvqIKzwuzFNm90Rp4o0jTdJ_9ZpnkO3LgE39alYYxQUlzI2OPjq_Lfg9XLfQsUoUlaODlKNuhvgW-E6O435OlgL-r4jkuczIHbL1wjdRndKDit0wXAGeXw5CETZH1F0Z7onwWbGnQK0oGCV_3AOXdJqH4LoW3Exyba0h3LuI1yWB4tpMJMdQJDpZTVAFUrIBV7Ojx1tanLoyOqtd4UPvpCxOKfD5Z0CsABQzSRC_80yKJOmJiR8nIKu1FBsfk3mFVDhwOixbSHzMYWqxUAnTmNpc1fVNWkIKDTA2Q1udkye1ikdC5W6ah9RAk647h8js0LBFzHnymqy7CQRU4ZNZ4cFlNPBQ9s8XPJ3kgDElIm41_-Dh5_5kEXWt2VdZkFBOFdeIzl4p84QDwSLW2Lvvnpskv1M4vmsrt_BXoNG0YcCOVFqpgkwOc6S1tS-v-uXC0iDvrSxbpUzMFeQlli2hWfHXPys1cT6yCr5kOR_f5S-6uikfLm7esAH5rZyCll7oNKVG4RSosu3S2_3EP1m4Ai15ulUGgTSIWPqs6nvOXQgguTOxXqFFOpYzvrtC=w1198-h1400-no");
        background-size: cover;
        background-repeat: no-repeat;
    }
    .main-box {
        margin-top: 150px;
        margin-bottom: 0px;
        margin-right: 50px;
    }
    .main-sub-box-1{
        display: inline-block;
        width: 150px;
        background-color: #fafafa;
        overflow: visible;
        margin-top: -130px;
        padding-right: 50px;
        padding-left: 220px;
    }
    .profile-pic{
        right: 0px;
        width: 150px;
        height: 150px;
        display: block;
        border-radius: 50%;
        border: 1px solid #DDDDDD;
        @if(isset($user->userInfo->avatar))
        background: url("{{ $user->userInfo->avatar }}") no-repeat -35px;
        @else
        background: url("https://i0.wp.com/abrakadabra.fun/uploads/posts/2021-12/1640528661_1-abrakadabra-fun-p-serii-chelovek-na-avu-1.png?ssl=1") no-repeat 0;
        @endif
        background-size: cover;
    }
    .sub-title{
        font-family:'-apple-system', BlinkMacSystemFont,'Open Sans', sans-serif;
        font-size: 110%;
        font-weight: bold;
        letter-spacing: 5px;
        margin-top: 30px;
    }
    .sub-title:hover {
        transform: scale(1.04);
        color: #A8C1F0;
    }
    .sub-title-box {
        width: 100%;
        text-align: right;
        overflow: visible;
    }
    .sub-link{
        color: inherit;
        text-decoration: none;
    }
    .sub-link:hover{
        color: #A8C1F0;
    }
    .stripe-border{
        background-image: url("https://lh3.googleusercontent.com/s24E8SuChrk8ZhKK-KEsBTg2MzeLN3XDzWqL1K3b_Ccxc7uF5r0Y1g7j7UDNimn5HlsL_0Jk-3U4pwqKoNUCOxE5NtHA1Zasp1Ub0issLk3FsjQ0maKrmIWutvnb1wWizmyeVcbZQluc2WX8MI8S8ubPXTaJxJwJG3v8sURxlpgxFGjKvXUfSUlO12EQmPVACTmjSUd7qLGqkhMb0EHZc_zvwlHcyppkTJfdKvJ2gqd-Nxm4wAmCKE-k3Ea2R2AxiwM0T1vcVDPKbt6WTnRKhz7T2pv8VdwyOgjNESkRP2sU3NJMHL8gZ67SOaKH8qQk6UrKjIFtMnKgQlrAiepLWQi3DpsvhWtZHKuBN7cuguqNMSylWSgDJ1MAPPHjBlkl-uyPO3z6MO_3vr3DQ-6oYl6O09oZ25i2WG3h74F9k9B23zmfCjrOqw23osoiQsmrcAkyIOY8WSpkb6vU--Itp4IdwRuPcR5lQlfSD9pW2VcAXL5IkP7_ruMkDNqEirudJJmw9R37du3IhlZsEru-E1_XgKwZOJ4SwcjmEKHLDgmzpWQ8uhHv-PaVp7flPZYBIN8CdmM4xW-2JArI9nCBIUmuZj288wf8yo12cUemmERvcf_7Jze-=w1642-h737-no");
        width: 60vw;
        background-size: 30%;
        height: 40px;
        margin-top: 0px;
    }
    .main-sub-box-2{
        display: inline-block;
        height: 250px;
        width: 48%;
        text-align: left;
        background-color: #fafafa;
        overflow: visible;
        vertical-align: top;
        margin-left: 180px;
        margin-top: -125px;
    }
    .title{
        font-family:'Ek Mukta', sans-serif;
        font-size: 193.4%;
        font-weight: bold;
        width: 100%;
        letter-spacing: 10px;
        margin-bottom: 0px;
    }
    .main-title{
        margin-top: -10px;
        text-transform: uppercase;
    }
    .paragraph {
        font-family: '-apple-system', BlinkMacSystemFont,'Open Sans', sans-serif;
        font-size: 95%;
        text-align: left;
        font-weight: lighter;
        line-height: 26px;
        letter-spacing: 0.3px;
        width: 100%;
        margin: 0 auto;
        margin-top: -10px;
    }
    .button-line{
        width: 110%;
        margin-left: -15px;
        margin-top: 0px;
        margin-bottom: 40px;
    }
    .round-button{
        display: inline-block;
        overflow: visible;
    }
    .round-button img {
        width: 20px;
        height: 20px;
        padding: 15px;
    }
    .button-text {
        visibility: hidden;
        font-family: '-apple-system', BlinkMacSystemFont,'Open Sans', sans-serif;
        font-size: 75%;
        margin-top: 0px;
        opacity: 0.9;
        text-align: center;
        font-weight: lighter;
    }
    .round-button:hover .button-text{
        visibility: visible;
    }
    .linkedIn-button{
        content: url("https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-linkedin-1.png");
    }
    .linkedIn-button:hover {
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-linkedin-1.png&r=168&g=193&b=240");
    }
    /*A8C1F0*/
    .fb-button{
        content: url("https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-facebook-1.png");
    }
    .fb-button:hover {
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-facebook-1.png&r=168&g=193&b=240");
    }
    .codePen-button{
        content: url("https://www.shareicon.net/download/2016/11/14/852181_codepen.svg");
    }
    .codePen-button:hover {
        content: url("https://cdn.worldvectorlogo.com/logos/codepen-icon.svg");
    }
    .gitHub-button{
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-github-1.png&r=0&g=0&b=0");
    }
    .gitHub-button:hover{
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-github-1.png&r=168&g=193&b=240");
    }
    .email-button{
        content: url("https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-email-3.png");
    }
    .email-button:hover {
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-email-3.png&r=168&g=193&b=240");
    }

    /*ABOUT ME PAGE AND PORTFOLIO PAGE*/
    .sub-page{
        display: inline-block;
        width: 100%;
        min-height: 100vh;
        background-color: #ZZZZZ;
        padding-top: 30px;
        text-align: left;
        margin-left: 40px;
    }

    .parent-page{
        margin-left: 100px;
        font-weight: bold;
        color: grey;
    }
    .parent-page:hover {
        text-decoration: underline;
    }
    .current-page{
    }
    /*ABOUT ME PAGE */
    .about-me{
        margin-left: 0 auto;
        margin-right: 0 auto;
        background-color: #fafafa;
    }
    .info-box{
        display: inline-block;
        font-family: '-apple-system', BlinkMacSystemFont,'Open Sans', sans-serif;
        font-size: 100%;
        width: 450px;
        margin: 20px;
        color: rgb(70,70,70);
        vertical-align: top;
        margin-top: 50px;
    }
    td:nth-child(odd) {
        padding-right: 20px;
        vertical-align: top;
    }
    .work-icon{
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2012/png/iconmonstr-pencil-10.png&r=0&g=0&b=0");
    }
    ul{
        list-style-type: none;
        margin-left: -40px;
    }
    .education-icon{
        content: url("https://iconmonstr.com/wp-content/g/gd/makefg.php?i=../assets/preview/2017/png/iconmonstr-education-1.png&r=0&g=0&b=0");
    }
    .ab-icon{
        width: 20px;
        height: 20px;
        margin-top: 2px;
    }
    .grey-title{
        font-size: 110%;
        letter-spacing: 4px;
        color: black;
    }
</style>

