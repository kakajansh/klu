<img src="/img/logo.png" alt="Logo" width="120px" style="">
<h2 class="ui center aligned inverted header">Kurslarimiz</h2>
<div class="ui divider"></div>
<div class="ui three column grid">
<?php $sayi = 1; ?>
@foreach($courses as $course)
  <div class="column">
    <div class="ui fluid card">
      <div class="image">
        <img src="/img/{{ $sayi }}.jpg" style="height: 200px">
      </div>
      <div class="content">
        <a href="{{ url('courses', $course->slug) }}" class="header">{{ $course->title }}</a>
      </div>
    </div>
  </div>
<?php $sayi++; ?>
@endforeach
</div>