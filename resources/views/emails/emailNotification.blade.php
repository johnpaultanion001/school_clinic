
@component('mail::message')
<style>
    .center {
            margin: auto;
            width: 100%;
            text-align: center;
            text-align: center;
            color: gray;
        }
    hr{
        border-top: .1em solid whitesmoke;
    }
</style>

<div class="center">
    <img src="https://cdn.pixabay.com/photo/2019/01/01/14/55/calendar-3906791_960_720.jpg" alt="send" width="100"/>
    <br>
    <br>
    <strong style="font-size: 22px; text-transform: uppercase;">{{ $content['notif_message'] }}</strong>
    <br>
    <br>
    <strong style="font-size: 18px;">Reference Number:</strong>
    <br>
    <strong style="font-size: 20px;">{{ $content['ref_number'] }}</strong>
    <br>
    <br>
    <hr>
        <strong style="font-size: 15px;">Symptoms:  {{ $content['symptoms'] }}</strong>
    <hr>
        <strong style="font-size: 15px;">Date/Time:  {{ $content['date_and_time'] }}</strong>
    <hr>
        <strong style="font-size: 15px;">Name: {{ $content['name'] }}</strong>
    <hr>
        <strong style="font-size: 15px;">Message: {{ $content['msg'] }}</strong>
</div>



 

@endcomponent
