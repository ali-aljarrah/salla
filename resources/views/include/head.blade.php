<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <style>
        .loader,.loader::after,.loader::before{box-sizing:border-box;box-sizing:border-box}.loader-wrapper{position:fixed;top:0;left:0;right:0;bottom:0;z-index:9999;background:#fff;display:flex;justify-content:center;align-items:center;opacity:0;visibility:hidden;transition:.2s}.loader-wrapper.show{opacity:1;visibility:visible;transition:.2s}.loader{width:48px;height:48px;border-radius:50%;display:inline-block;position:relative;border:3px solid;border-color:#fff #fff transparent transparent;animation:1s linear infinite rotation}.loader::after,.loader::before{content:'';position:absolute;left:0;right:0;top:0;bottom:0;margin:auto;border:3px solid;border-color:transparent transparent #aaf600 #aaf600;width:40px;height:40px;border-radius:50%;animation:.5s linear infinite rotationBack;transform-origin:center center}.loader::before{width:32px;height:32px;border-color:#fff #fff transparent transparent;animation:1.5s linear infinite rotation}@keyframes rotation{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes rotationBack{0%{transform:rotate(0)}100%{transform:rotate(-360deg)}}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <meta content="business.business" property="og:type">
