

    <!DOCTYPE html>
    <html lang="en">
@php($settings = \App\Models\Setting::first())
    <head>
        <!-- Meta Tags
            ============================================= -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{$settings->ResDesc()}}">
        <meta name="author" content="creative-wp">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <!-- Your Title Page
            ============================================= -->
        <title> {{__('menu.register')}}</title>
        <!-- Favicon Icons
            ============================================= -->
        <link rel="shortcut icon" href="{{$settings->icon}}">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="{{url('/img/favicon/apple-touch-icon-57x57.png')}}">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('/img/favicon/apple-touch-icon-114x114.png')}}">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('/img/favicon/apple-touch-icon-72x72.png')}}">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="{{url('/img/favicon/apple-touch-icon-144x144.png')}}">
        <!-- Bootstrap Links
             ============================================= -->
        <!-- Bootstrap CSS  -->
        <link href="{{url('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Plugins
             ============================================= -->
        <!-- Owl Carousal -->
        <link rel="stylesheet" href="{{url('/stylesheets/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{url('/stylesheets/owl.theme.css')}}">
        <!-- Animate -->
        <link rel="stylesheet" href="{{url('/stylesheets/animate.css')}}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{url('/stylesheets/jquery.datetimepicker.css')}}">
        <!-- Pretty Photo -->
        <link rel="stylesheet" href="{{url('/stylesheets/prettyPhoto.css')}}">
        <!-- Font awsome icons -->
        <link rel="stylesheet" href="{{url('/stylesheets/font-awesome.min.css')}}">
        <!-- General Stylesheet
            ============================================= -->
        <!-- Custom Fonts Setup via Font-face CSS3 -->
        <link href="{{url('/fonts/fonts.css')}}" rel="stylesheet">
        <!-- Main Template Styles -->
        <link href="{{url('/stylesheets/main.css')}}" rel="stylesheet">
        <!-- Main Template Responsive Styles -->
        <link href="{{url('/stylesheets/main-responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="{{url('/javascripts/libs/html5shiv.js')}}"></script>
      <script src="{{url('/javascripts/libs/respond.min.js')}}"></script>
      <style>
.country {
 color: black;
}
       input{
margin: 20px;
}



   input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .code-input{
            font-size: 30px;
            font-family: -webkit-body;
        }
       </style>
<style >

.intl-tel-input {
  position: relative;
  display: inline-block;
}

.intl-tel-input * {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.intl-tel-input .hide {
  display: none;
}

.intl-tel-input .v-hide {
  visibility: hidden;
}

.intl-tel-input input,
.intl-tel-input input[type=text],
.intl-tel-input input[type=tel] {
  position: relative;
  z-index: 0;
  margin-top: 0 !important;
  margin-bottom: 0 !important;
  padding-right: 36px;
  margin-right: 0;
}

.intl-tel-input .flag-container {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  padding: 1px;
}

.intl-tel-input .selected-flag {
  z-index: 1;
  position: relative;
  width: 36px;
  height: 100%;
  padding: 0 0 0 8px;
}

.intl-tel-input .selected-flag .iti-flag {
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
}

.intl-tel-input .selected-flag .iti-arrow {
  position: absolute;
  top: 50%;
  margin-top: -2px;
  right: 6px;
  width: 0;
  height: 0;
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-top: 4px solid #555;
}

.intl-tel-input .selected-flag .iti-arrow.up {
  border-top: none;
  border-bottom: 4px solid #555;
}

.intl-tel-input .country-list {
  position: absolute;
  z-index: 2;
  list-style: none;
  text-align: left;
  padding: 0;
  margin: 0 0 0 -1px;
  box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
  background-color: black;
  border: 1px solid #CCC;
  white-space: nowrap;
  max-height: 200px;
  overflow-y: scroll;
color: black;
}

.intl-tel-input .country-list.dropup {
  bottom: 100%;
  margin-bottom: -1px;
}

.intl-tel-input .country-list .flag-box {
  display: inline-block;
  width: 20px;
}

@media (max-width: 500px) {
  .intl-tel-input .country-list {
    white-space: normal;
  }
}

.intl-tel-input .country-list .divider {
  padding-bottom: 5px;
  margin-bottom: 5px;
  border-bottom: 1px solid #CCC;
}

.intl-tel-input .country-list .country {
  padding: 5px 10px;
}

.intl-tel-input .country-list .country .dial-code {
  color: #999;
}

.intl-tel-input .country-list .country.highlight {
  background-color: rgba(0, 0, 0, 0.05);
}

.intl-tel-input .country-list .flag-box,
.intl-tel-input .country-list .country-name,
.intl-tel-input .country-list .dial-code {
  vertical-align: middle;

}

.intl-tel-input .country-list .flag-box,
.intl-tel-input .country-list .country-name {
  margin-right: 6px;

}

.intl-tel-input.allow-dropdown input,
.intl-tel-input.allow-dropdown input[type=text],
.intl-tel-input.allow-dropdown input[type=tel],
.intl-tel-input.separate-dial-code input,
.intl-tel-input.separate-dial-code input[type=text],
.intl-tel-input.separate-dial-code input[type=tel] {
  padding-right: 6px;
  padding-left: 52px;
  margin-left: 0;
}

.intl-tel-input.allow-dropdown .flag-container,
.intl-tel-input.separate-dial-code .flag-container {
  right: auto;
  left: 0;
}

.intl-tel-input.allow-dropdown .selected-flag,
.intl-tel-input.separate-dial-code .selected-flag {
  width: 46px;
}

.intl-tel-input.allow-dropdown .flag-container:hover {
  cursor: pointer;
}

.intl-tel-input.allow-dropdown .flag-container:hover .selected-flag {
  background-color: rgba(0, 0, 0, 0.05);
}

.intl-tel-input.allow-dropdown input[disabled] + .flag-container:hover,
.intl-tel-input.allow-dropdown input[readonly] + .flag-container:hover {
  cursor: default;
}

.intl-tel-input.allow-dropdown input[disabled] + .flag-container:hover .selected-flag,
.intl-tel-input.allow-dropdown input[readonly] + .flag-container:hover .selected-flag {
  background-color: transparent;
}

.intl-tel-input.separate-dial-code .selected-flag {
  background-color: rgba(0, 0, 0, 0.05);
  display: table;
}

.intl-tel-input.separate-dial-code .selected-dial-code {
  display: table-cell;
  vertical-align: middle;
  padding-left: 28px;
}

.intl-tel-input.separate-dial-code.iti-sdc-2 input,
.intl-tel-input.separate-dial-code.iti-sdc-2 input[type=text],
.intl-tel-input.separate-dial-code.iti-sdc-2 input[type=tel] {
  padding-left: 66px;
}

.intl-tel-input.separate-dial-code.iti-sdc-2 .selected-flag {
  width: 60px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input,
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input[type=text],
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 input[type=tel] {
  padding-left: 76px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-2 .selected-flag {
  width: 70px;
}

.intl-tel-input.separate-dial-code.iti-sdc-3 input,
.intl-tel-input.separate-dial-code.iti-sdc-3 input[type=text],
.intl-tel-input.separate-dial-code.iti-sdc-3 input[type=tel] {
  padding-left: 74px;
}

.intl-tel-input.separate-dial-code.iti-sdc-3 .selected-flag {
  width: 68px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input,
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=text],
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=tel] {
  padding-left: 84px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 .selected-flag {
  width: 78px;
}

.intl-tel-input.separate-dial-code.iti-sdc-4 input,
.intl-tel-input.separate-dial-code.iti-sdc-4 input[type=text],
.intl-tel-input.separate-dial-code.iti-sdc-4 input[type=tel] {
  padding-left: 82px;
}

.intl-tel-input.separate-dial-code.iti-sdc-4 .selected-flag {
  width: 76px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input,
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=text],
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=tel] {
  padding-left: 92px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 .selected-flag {
  width: 86px;
}

.intl-tel-input.separate-dial-code.iti-sdc-5 input,
.intl-tel-input.separate-dial-code.iti-sdc-5 input[type=text],
.intl-tel-input.separate-dial-code.iti-sdc-5 input[type=tel] {
  padding-left: 90px;
}

.intl-tel-input.separate-dial-code.iti-sdc-5 .selected-flag {
  width: 84px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input,
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=text],
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=tel] {
  padding-left: 100px;
}

.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 .selected-flag {
  width: 94px;
}

.intl-tel-input.iti-container {
  position: absolute;
  top: -1000px;
  left: -1000px;
  z-index: 1060;
  padding: 1px;
}

.intl-tel-input.iti-container:hover {
  cursor: pointer;
}

.iti-mobile .intl-tel-input.iti-container {
  top: 30px;
  bottom: 30px;
  left: 30px;
  right: 30px;
  position: fixed;
}

.iti-mobile .intl-tel-input .country-list {
  max-height: 100%;
  width: 100%;
}

.iti-mobile .intl-tel-input .country-list .country {
  padding: 10px 10px;
  line-height: 1.5em;
}

.iti-flag {
  width: 20px;
}

.iti-flag.be {
  width: 18px;
}

.iti-flag.ch {
  width: 15px;
}

.iti-flag.mc {
  width: 19px;
}

.iti-flag.ne {
  width: 18px;
}

.iti-flag.np {
  width: 13px;
}

.iti-flag.va {
  width: 15px;
}

@media only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (min--moz-device-pixel-ratio: 2),
only screen and (-o-min-device-pixel-ratio: 2 / 1),
only screen and (min-device-pixel-ratio: 2),
only screen and (min-resolution: 192dpi),
only screen and (min-resolution: 2dppx) {
  .iti-flag {
    background-size: 5630px 15px;
  }
}

.iti-flag.ac {
  height: 10px;
  background-position: 0px 0px;
}

.iti-flag.ad {
  height: 14px;
  background-position: -22px 0px;
}

.iti-flag.ae {
  height: 10px;
  background-position: -44px 0px;
}

.iti-flag.af {
  height: 14px;
  background-position: -66px 0px;
}

.iti-flag.ag {
  height: 14px;
  background-position: -88px 0px;
}

.iti-flag.ai {
  height: 10px;
  background-position: -110px 0px;
}

.iti-flag.al {
  height: 15px;
  background-position: -132px 0px;
}

.iti-flag.am {
  height: 10px;
  background-position: -154px 0px;
}

.iti-flag.ao {
  height: 14px;
  background-position: -176px 0px;
}

.iti-flag.aq {
  height: 14px;
  background-position: -198px 0px;
}

.iti-flag.ar {
  height: 13px;
  background-position: -220px 0px;
}

.iti-flag.as {
  height: 10px;
  background-position: -242px 0px;
}

.iti-flag.at {
  height: 14px;
  background-position: -264px 0px;
}

.iti-flag.au {
  height: 10px;
  background-position: -286px 0px;
}

.iti-flag.aw {
  height: 14px;
  background-position: -308px 0px;
}

.iti-flag.ax {
  height: 13px;
  background-position: -330px 0px;
}

.iti-flag.az {
  height: 10px;
  background-position: -352px 0px;
}

.iti-flag.ba {
  height: 10px;
  background-position: -374px 0px;
}

.iti-flag.bb {
  height: 14px;
  background-position: -396px 0px;
}

.iti-flag.bd {
  height: 12px;
  background-position: -418px 0px;
}

.iti-flag.be {
  height: 15px;
  background-position: -440px 0px;
}

.iti-flag.bf {
  height: 14px;
  background-position: -460px 0px;
}

.iti-flag.bg {
  height: 12px;
  background-position: -482px 0px;
}

.iti-flag.bh {
  height: 12px;
  background-position: -504px 0px;
}

.iti-flag.bi {
  height: 12px;
  background-position: -526px 0px;
}

.iti-flag.bj {
  height: 14px;
  background-position: -548px 0px;
}

.iti-flag.bl {
  height: 14px;
  background-position: -570px 0px;
}

.iti-flag.bm {
  height: 10px;
  background-position: -592px 0px;
}

.iti-flag.bn {
  height: 10px;
  background-position: -614px 0px;
}

.iti-flag.bo {
  height: 14px;
  background-position: -636px 0px;
}

.iti-flag.bq {
  height: 14px;
  background-position: -658px 0px;
}

.iti-flag.br {
  height: 14px;
  background-position: -680px 0px;
}

.iti-flag.bs {
  height: 10px;
  background-position: -702px 0px;
}

.iti-flag.bt {
  height: 14px;
  background-position: -724px 0px;
}

.iti-flag.bv {
  height: 15px;
  background-position: -746px 0px;
}

.iti-flag.bw {
  height: 14px;
  background-position: -768px 0px;
}

.iti-flag.by {
  height: 10px;
  background-position: -790px 0px;
}

.iti-flag.bz {
  height: 14px;
  background-position: -812px 0px;
}

.iti-flag.ca {
  height: 10px;
  background-position: -834px 0px;
}

.iti-flag.cc {
  height: 10px;
  background-position: -856px 0px;
}

.iti-flag.cd {
  height: 15px;
  background-position: -878px 0px;
}

.iti-flag.cf {
  height: 14px;
  background-position: -900px 0px;
}

.iti-flag.cg {
  height: 14px;
  background-position: -922px 0px;
}

.iti-flag.ch {
  height: 15px;
  background-position: -944px 0px;
}

.iti-flag.ci {
  height: 14px;
  background-position: -961px 0px;
}

.iti-flag.ck {
  height: 10px;
  background-position: -983px 0px;
}

.iti-flag.cl {
  height: 14px;
  background-position: -1005px 0px;
}

.iti-flag.cm {
  height: 14px;
  background-position: -1027px 0px;
}

.iti-flag.cn {
  height: 14px;
  background-position: -1049px 0px;
}

.iti-flag.co {
  height: 14px;
  background-position: -1071px 0px;
}

.iti-flag.cp {
  height: 14px;
  background-position: -1093px 0px;
}

.iti-flag.cr {
  height: 12px;
  background-position: -1115px 0px;
}

.iti-flag.cu {
  height: 10px;
  background-position: -1137px 0px;
}

.iti-flag.cv {
  height: 12px;
  background-position: -1159px 0px;
}

.iti-flag.cw {
  height: 14px;
  background-position: -1181px 0px;
}

.iti-flag.cx {
  height: 10px;
  background-position: -1203px 0px;
}

.iti-flag.cy {
  height: 13px;
  background-position: -1225px 0px;
}

.iti-flag.cz {
  height: 14px;
  background-position: -1247px 0px;
}

.iti-flag.de {
  height: 12px;
  background-position: -1269px 0px;
}

.iti-flag.dg {
  height: 10px;
  background-position: -1291px 0px;
}

.iti-flag.dj {
  height: 14px;
  background-position: -1313px 0px;
}

.iti-flag.dk {
  height: 15px;
  background-position: -1335px 0px;
}

.iti-flag.dm {
  height: 10px;
  background-position: -1357px 0px;
}

.iti-flag.do {
  height: 13px;
  background-position: -1379px 0px;
}

.iti-flag.dz {
  height: 14px;
  background-position: -1401px 0px;
}

.iti-flag.ea {
  height: 14px;
  background-position: -1423px 0px;
}

.iti-flag.ec {
  height: 14px;
  background-position: -1445px 0px;
}

.iti-flag.ee {
  height: 13px;
  background-position: -1467px 0px;
}

.iti-flag.eg {
  height: 14px;
  background-position: -1489px 0px;
}

.iti-flag.eh {
  height: 10px;
  background-position: -1511px 0px;
}

.iti-flag.er {
  height: 10px;
  background-position: -1533px 0px;
}

.iti-flag.es {
  height: 14px;
  background-position: -1555px 0px;
}

.iti-flag.et {
  height: 10px;
  background-position: -1577px 0px;
}

.iti-flag.eu {
  height: 14px;
  background-position: -1599px 0px;
}

.iti-flag.fi {
  height: 12px;
  background-position: -1621px 0px;
}

.iti-flag.fj {
  height: 10px;
  background-position: -1643px 0px;
}

.iti-flag.fk {
  height: 10px;
  background-position: -1665px 0px;
}

.iti-flag.fm {
  height: 11px;
  background-position: -1687px 0px;
}

.iti-flag.fo {
  height: 15px;
  background-position: -1709px 0px;
}

.iti-flag.fr {
  height: 14px;
  background-position: -1731px 0px;
}

.iti-flag.ga {
  height: 15px;
  background-position: -1753px 0px;
}

.iti-flag.gb {
  height: 10px;
  background-position: -1775px 0px;
}

.iti-flag.gd {
  height: 12px;
  background-position: -1797px 0px;
}

.iti-flag.ge {
  height: 14px;
  background-position: -1819px 0px;
}

.iti-flag.gf {
  height: 14px;
  background-position: -1841px 0px;
}

.iti-flag.gg {
  height: 14px;
  background-position: -1863px 0px;
}

.iti-flag.gh {
  height: 14px;
  background-position: -1885px 0px;
}

.iti-flag.gi {
  height: 10px;
  background-position: -1907px 0px;
}

.iti-flag.gl {
  height: 14px;
  background-position: -1929px 0px;
}

.iti-flag.gm {
  height: 14px;
  background-position: -1951px 0px;
}

.iti-flag.gn {
  height: 14px;
  background-position: -1973px 0px;
}

.iti-flag.gp {
  height: 14px;
  background-position: -1995px 0px;
}

.iti-flag.gq {
  height: 14px;
  background-position: -2017px 0px;
}

.iti-flag.gr {
  height: 14px;
  background-position: -2039px 0px;
}

.iti-flag.gs {
  height: 10px;
  background-position: -2061px 0px;
}

.iti-flag.gt {
  height: 13px;
  background-position: -2083px 0px;
}

.iti-flag.gu {
  height: 11px;
  background-position: -2105px 0px;
}

.iti-flag.gw {
  height: 10px;
  background-position: -2127px 0px;
}

.iti-flag.gy {
  height: 12px;
  background-position: -2149px 0px;
}

.iti-flag.hk {
  height: 14px;
  background-position: -2171px 0px;
}

.iti-flag.hm {
  height: 10px;
  background-position: -2193px 0px;
}

.iti-flag.hn {
  height: 10px;
  background-position: -2215px 0px;
}

.iti-flag.hr {
  height: 10px;
  background-position: -2237px 0px;
}

.iti-flag.ht {
  height: 12px;
  background-position: -2259px 0px;
}

.iti-flag.hu {
  height: 10px;
  background-position: -2281px 0px;
}

.iti-flag.ic {
  height: 14px;
  background-position: -2303px 0px;
}

.iti-flag.id {
  height: 14px;
  background-position: -2325px 0px;
}

.iti-flag.ie {
  height: 10px;
  background-position: -2347px 0px;
}

.iti-flag.il {
  height: 15px;
  background-position: -2369px 0px;
}

.iti-flag.im {
  height: 10px;
  background-position: -2391px 0px;
}

.iti-flag.in {
  height: 14px;
  background-position: -2413px 0px;
}

.iti-flag.io {
  height: 10px;
  background-position: -2435px 0px;
}

.iti-flag.iq {
  height: 14px;
  background-position: -2457px 0px;
}

.iti-flag.ir {
  height: 12px;
  background-position: -2479px 0px;
}

.iti-flag.is {
  height: 15px;
  background-position: -2501px 0px;
}

.iti-flag.it {
  height: 14px;
  background-position: -2523px 0px;
}

.iti-flag.je {
  height: 12px;
  background-position: -2545px 0px;
}

.iti-flag.jm {
  height: 10px;
  background-position: -2567px 0px;
}

.iti-flag.jo {
  height: 10px;
  background-position: -2589px 0px;
}

.iti-flag.jp {
  height: 14px;
  background-position: -2611px 0px;
}

.iti-flag.ke {
  height: 14px;
  background-position: -2633px 0px;
}

.iti-flag.kg {
  height: 12px;
  background-position: -2655px 0px;
}

.iti-flag.kh {
  height: 13px;
  background-position: -2677px 0px;
}

.iti-flag.ki {
  height: 10px;
  background-position: -2699px 0px;
}

.iti-flag.km {
  height: 12px;
  background-position: -2721px 0px;
}

.iti-flag.kn {
  height: 14px;
  background-position: -2743px 0px;
}

.iti-flag.kp {
  height: 10px;
  background-position: -2765px 0px;
}

.iti-flag.kr {
  height: 14px;
  background-position: -2787px 0px;
}

.iti-flag.kw {
  height: 10px;
  background-position: -2809px 0px;
}

.iti-flag.ky {
  height: 10px;
  background-position: -2831px 0px;
}

.iti-flag.kz {
  height: 10px;
  background-position: -2853px 0px;
}

.iti-flag.la {
  height: 14px;
  background-position: -2875px 0px;
}

.iti-flag.lb {
  height: 14px;
  background-position: -2897px 0px;
}

.iti-flag.lc {
  height: 10px;
  background-position: -2919px 0px;
}

.iti-flag.li {
  height: 12px;
  background-position: -2941px 0px;
}

.iti-flag.lk {
  height: 10px;
  background-position: -2963px 0px;
}

.iti-flag.lr {
  height: 11px;
  background-position: -2985px 0px;
}

.iti-flag.ls {
  height: 14px;
  background-position: -3007px 0px;
}

.iti-flag.lt {
  height: 12px;
  background-position: -3029px 0px;
}

.iti-flag.lu {
  height: 12px;
  background-position: -3051px 0px;
}

.iti-flag.lv {
  height: 10px;
  background-position: -3073px 0px;
}

.iti-flag.ly {
  height: 10px;
  background-position: -3095px 0px;
}

.iti-flag.ma {
  height: 14px;
  background-position: -3117px 0px;
}

.iti-flag.mc {
  height: 15px;
  background-position: -3139px 0px;
}

.iti-flag.md {
  height: 10px;
  background-position: -3160px 0px;
}

.iti-flag.me {
  height: 10px;
  background-position: -3182px 0px;
}

.iti-flag.mf {
  height: 14px;
  background-position: -3204px 0px;
}

.iti-flag.mg {
  height: 14px;
  background-position: -3226px 0px;
}

.iti-flag.mh {
  height: 11px;
  background-position: -3248px 0px;
}

.iti-flag.mk {
  height: 10px;
  background-position: -3270px 0px;
}

.iti-flag.ml {
  height: 14px;
  background-position: -3292px 0px;
}

.iti-flag.mm {
  height: 14px;
  background-position: -3314px 0px;
}

.iti-flag.mn {
  height: 10px;
  background-position: -3336px 0px;
}

.iti-flag.mo {
  height: 14px;
  background-position: -3358px 0px;
}

.iti-flag.mp {
  height: 10px;
  background-position: -3380px 0px;
}

.iti-flag.mq {
  height: 14px;
  background-position: -3402px 0px;
}

.iti-flag.mr {
  height: 14px;
  background-position: -3424px 0px;
}

.iti-flag.ms {
  height: 10px;
  background-position: -3446px 0px;
}

.iti-flag.mt {
  height: 14px;
  background-position: -3468px 0px;
}

.iti-flag.mu {
  height: 14px;
  background-position: -3490px 0px;
}

.iti-flag.mv {
  height: 14px;
  background-position: -3512px 0px;
}

.iti-flag.mw {
  height: 14px;
  background-position: -3534px 0px;
}

.iti-flag.mx {
  height: 12px;
  background-position: -3556px 0px;
}

.iti-flag.my {
  height: 10px;
  background-position: -3578px 0px;
}

.iti-flag.mz {
  height: 14px;
  background-position: -3600px 0px;
}

.iti-flag.na {
  height: 14px;
  background-position: -3622px 0px;
}

.iti-flag.nc {
  height: 10px;
  background-position: -3644px 0px;
}

.iti-flag.ne {
  height: 15px;
  background-position: -3666px 0px;
}

.iti-flag.nf {
  height: 10px;
  background-position: -3686px 0px;
}

.iti-flag.ng {
  height: 10px;
  background-position: -3708px 0px;
}

.iti-flag.ni {
  height: 12px;
  background-position: -3730px 0px;
}

.iti-flag.nl {
  height: 14px;
  background-position: -3752px 0px;
}

.iti-flag.no {
  height: 15px;
  background-position: -3774px 0px;
}

.iti-flag.np {
  height: 15px;
  background-position: -3796px 0px;
}

.iti-flag.nr {
  height: 10px;
  background-position: -3811px 0px;
}

.iti-flag.nu {
  height: 10px;
  background-position: -3833px 0px;
}

.iti-flag.nz {
  height: 10px;
  background-position: -3855px 0px;
}

.iti-flag.om {
  height: 10px;
  background-position: -3877px 0px;
}

.iti-flag.pa {
  height: 14px;
  background-position: -3899px 0px;
}

.iti-flag.pe {
  height: 14px;
  background-position: -3921px 0px;
}

.iti-flag.pf {
  height: 14px;
  background-position: -3943px 0px;
}

.iti-flag.pg {
  height: 15px;
  background-position: -3965px 0px;
}

.iti-flag.ph {
  height: 10px;
  background-position: -3987px 0px;
}

.iti-flag.pk {
  height: 14px;
  background-position: -4009px 0px;
}

.iti-flag.pl {
  height: 13px;
  background-position: -4031px 0px;
}

.iti-flag.pm {
  height: 14px;
  background-position: -4053px 0px;
}

.iti-flag.pn {
  height: 10px;
  background-position: -4075px 0px;
}

.iti-flag.pr {
  height: 14px;
  background-position: -4097px 0px;
}

.iti-flag.ps {
  height: 10px;
  background-position: -4119px 0px;
}

.iti-flag.pt {
  height: 14px;
  background-position: -4141px 0px;
}

.iti-flag.pw {
  height: 13px;
  background-position: -4163px 0px;
}

.iti-flag.py {
  height: 11px;
  background-position: -4185px 0px;
}

.iti-flag.qa {
  height: 8px;
  background-position: -4207px 0px;
}

.iti-flag.re {
  height: 14px;
  background-position: -4229px 0px;
}

.iti-flag.ro {
  height: 14px;
  background-position: -4251px 0px;
}

.iti-flag.rs {
  height: 14px;
  background-position: -4273px 0px;
}

.iti-flag.ru {
  height: 14px;
  background-position: -4295px 0px;
}

.iti-flag.rw {
  height: 14px;
  background-position: -4317px 0px;
}

.iti-flag.sa {
  height: 14px;
  background-position: -4339px 0px;
}

.iti-flag.sb {
  height: 10px;
  background-position: -4361px 0px;
}

.iti-flag.sc {
  height: 10px;
  background-position: -4383px 0px;
}

.iti-flag.sd {
  height: 10px;
  background-position: -4405px 0px;
}

.iti-flag.se {
  height: 13px;
  background-position: -4427px 0px;
}

.iti-flag.sg {
  height: 14px;
  background-position: -4449px 0px;
}

.iti-flag.sh {
  height: 10px;
  background-position: -4471px 0px;
}

.iti-flag.si {
  height: 10px;
  background-position: -4493px 0px;
}

.iti-flag.sj {
  height: 15px;
  background-position: -4515px 0px;
}

.iti-flag.sk {
  height: 14px;
  background-position: -4537px 0px;
}

.iti-flag.sl {
  height: 14px;
  background-position: -4559px 0px;
}

.iti-flag.sm {
  height: 15px;
  background-position: -4581px 0px;
}

.iti-flag.sn {
  height: 14px;
  background-position: -4603px 0px;
}

.iti-flag.so {
  height: 14px;
  background-position: -4625px 0px;
}

.iti-flag.sr {
  height: 14px;
  background-position: -4647px 0px;
}

.iti-flag.ss {
  height: 10px;
  background-position: -4669px 0px;
}

.iti-flag.st {
  height: 10px;
  background-position: -4691px 0px;
}

.iti-flag.sv {
  height: 12px;
  background-position: -4713px 0px;
}

.iti-flag.sx {
  height: 14px;
  background-position: -4735px 0px;
}

.iti-flag.sy {
  height: 14px;
  background-position: -4757px 0px;
}

.iti-flag.sz {
  height: 14px;
  background-position: -4779px 0px;
}

.iti-flag.ta {
  height: 10px;
  background-position: -4801px 0px;
}

.iti-flag.tc {
  height: 10px;
  background-position: -4823px 0px;
}

.iti-flag.td {
  height: 14px;
  background-position: -4845px 0px;
}

.iti-flag.tf {
  height: 14px;
  background-position: -4867px 0px;
}

.iti-flag.tg {
  height: 13px;
  background-position: -4889px 0px;
}

.iti-flag.th {
  height: 14px;
  background-position: -4911px 0px;
}

.iti-flag.tj {
  height: 10px;
  background-position: -4933px 0px;
}

.iti-flag.tk {
  height: 10px;
  background-position: -4955px 0px;
}

.iti-flag.tl {
  height: 10px;
  background-position: -4977px 0px;
}

.iti-flag.tm {
  height: 14px;
  background-position: -4999px 0px;
}

.iti-flag.tn {
  height: 14px;
  background-position: -5021px 0px;
}

.iti-flag.to {
  height: 10px;
  background-position: -5043px 0px;
}

.iti-flag.tr {
  height: 14px;
  background-position: -5065px 0px;
}

.iti-flag.tt {
  height: 12px;
  background-position: -5087px 0px;
}

.iti-flag.tv {
  height: 10px;
  background-position: -5109px 0px;
}

.iti-flag.tw {
  height: 14px;
  background-position: -5131px 0px;
}

.iti-flag.tz {
  height: 14px;
  background-position: -5153px 0px;
}

.iti-flag.ua {
  height: 14px;
  background-position: -5175px 0px;
}

.iti-flag.ug {
  height: 14px;
  background-position: -5197px 0px;
}

.iti-flag.um {
  height: 11px;
  background-position: -5219px 0px;
}

.iti-flag.us {
  height: 11px;
  background-position: -5241px 0px;
}

.iti-flag.uy {
  height: 14px;
  background-position: -5263px 0px;
}

.iti-flag.uz {
  height: 10px;
  background-position: -5285px 0px;
}

.iti-flag.va {
  height: 15px;
  background-position: -5307px 0px;
}

.iti-flag.vc {
  height: 14px;
  background-position: -5324px 0px;
}

.iti-flag.ve {
  height: 14px;
  background-position: -5346px 0px;
}

.iti-flag.vg {
  height: 10px;
  background-position: -5368px 0px;
}

.iti-flag.vi {
  height: 14px;
  background-position: -5390px 0px;
}

.iti-flag.vn {
  height: 14px;
  background-position: -5412px 0px;
}

.iti-flag.vu {
  height: 12px;
  background-position: -5434px 0px;
}

.iti-flag.wf {
  height: 14px;
  background-position: -5456px 0px;
}

.iti-flag.ws {
  height: 10px;
  background-position: -5478px 0px;
}

.iti-flag.xk {
  height: 15px;
  background-position: -5500px 0px;
}

.iti-flag.ye {
  height: 14px;
  background-position: -5522px 0px;
}

.iti-flag.yt {
  height: 14px;
  background-position: -5544px 0px;
}

.iti-flag.za {
  height: 14px;
  background-position: -5566px 0px;
}

.iti-flag.zm {
  height: 14px;
  background-position: -5588px 0px;
}

.iti-flag.zw {
  height: 10px;
  background-position: -5610px 0px;
}

.iti-flag {
  width: 20px;
  height: 15px;
  box-shadow: 0px 0px 1px 0px #888;
  background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/img/flags.png");
  background-repeat: no-repeat;
  background-color: #DBDBDB;
  background-position: 20px 0;
}

@media only screen and (-webkit-min-device-pixel-ratio: 2),
only screen and (min--moz-device-pixel-ratio: 2),
only screen and (-o-min-device-pixel-ratio: 2 / 1),
only screen and (min-device-pixel-ratio: 2),
only screen and (min-resolution: 192dpi),
only screen and (min-resolution: 2dppx) {
  .iti-flag {
    background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/img/flags@2x.png");
  }
}

.iti-flag.np {
  background-color: transparent;
}

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

body {
  margin: 20px;
  font-size: 14px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: #555;
}

.hide {
  display: none;
}

pre {
  margin: 0 !important;
  display: inline-block;
}

.token.operator,
.token.entity,
.token.url,
.language-css .token.string,
.style .token.string,
.token.variable {
  background: none;
}

input,
button {
  height: 35px;
  margin: 0;
  padding: 6px 12px;
  border-radius: 2px;
  font-family: inherit;
  font-size: 100%;
  color: inherit;
}

input[disabled],
button[disabled] {
  background-color: #eee;
}

input,
select {
  border: 1px solid #CCC;
  width: 250px;
}

::-webkit-input-placeholder {
  color: #BBB;
}

::-moz-placeholder {
  /* Firefox 19+ */
  color: #BBB;
  opacity: 1;
}

:-ms-input-placeholder {
  color: #BBB;
}

button {
  color: #FFF;
  background-color: #428BCA;
  border: 1px solid #357EBD;
}

button:hover {
  background-color: #3276B1;
  border-color: #285E8E;
  cursor: pointer;
}

#result {
  margin-bottom: 100px;
}


</style>
    <![endif]-->
{{--        <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">--}}
{{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}

{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>--}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <style>
            .intl-tel-input .country-list .flag-box, .intl-tel-input .country-list .country-name{
                color: black;
            }
            .code-input{
                width: 50px;
                height: 55px;
                font-size: 30px;
                font-family: -webkit-body;
                padding: 10px;
                font-size: 20px;
                text-align: center;
                font-weight: bold;
            }
            #shop_cart>a>i{
                color: {{$settings->theme_colour}};
            }

        </style>
        <style>
            @font-face {
                font-family: bahiji;
                src: url('{{asset('/fonts/Bahij_TheSansArabic-Bold.ttf')}}');
            }
        </style>

    </head>
    <body style="font-family: 'bahiji'">
    <!-- Loader
        ============================================= -->
    <div id="loader2">
        <div class="loader-item"> <img src="{{url($settings->logo)}}" alt="" style="width:225px">
            <div class="sk-spinner sk-spinner-wave">
                <div class="sk-rect1" style="background-color:{{$settings->theme_colour}}"></div>
                <div class="sk-rect2" style="background-color:{{$settings->theme_colour}}"></div>
                <div class="sk-rect3" style="background-color:{{$settings->theme_colour}}"></div>
                <div class="sk-rect4" style="background-color:{{$settings->theme_colour}}"></div>
                <div class="sk-rect5"  style="background-color:{{$settings->theme_colour}}"></div>
            </div>
        </div>
    </div>
    <!-- End Loader -->
    <!-- Document Wrapper
        ============================================= -->
    <div id="wrapper">
        <div class="modal" tabindex="-1" role="dialog" id="user_verification_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('menu.Mobile Verification Code')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h3 class="message" style="color: black"></h3>

                        <span class="mobile-text">{{__('menu.Enter the code we just send on your mobile')}}    </span>

                        <form id="user_verify_form"  class="content-area">
                            @csrf



{{--                            <p><a href='#'>Need help?</a></p>--}}
                            <fieldset class='number-code'>
                                <legend>{{__('menu.OTP Code')}}</legend>
                                <div >
                                    <input type="hidden" name="generated_code" class="code">
                                    <input type="hidden" name="phone" class="phone">

                                        <input  id="codeBox1" name='code_1' type="number" class='code-input ' maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" required/>
                                        <input  id="codeBox2" name='code_2' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" required/>
                                        <input  id="codeBox3" name='code_3' type="number" class='code-input'  maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" required/>
                                        <input  id="codeBox4" name='code_4' type="number" class='code-input'  maxlength="1"  onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" required/>



                                </div>
                            </fieldset>


                        </form>
{{--                        <p><a href='#'>Resend Code ?</a></p>--}}
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button"  onclick="userVerify()" class="btn  btn-block " style="background-color: rgb(102, 83, 255);color: white" >
                                    {{__('menu.Verify')}} </button>
                            </div>

                            <div class="col-md-6">
                                <button type="button"  class="btn btn-secondary btn-block black" data-dismiss="modal">
                                    {{__('menu.Close')}}</button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Full Background BG

              ============================================= -->
        <section class="login-full dark clearfix" >
            <!-- Bg Full Bg -->
{{--            {{$pages[1]->image}}--}}
            <div class="fullheight full-bg " style="@if($pages->count() > 0) background-image:url({{$pages[1]->image}})@endif;">
                <div class="bg-transparent">
                    <!-- Slider content -->
                    <div class="slider-content">

                                <!-- Head Title -->
                                <div class="head_title">

                                    <h1 style="color:#ffffff">{{__('menu.register')}}</h1>
                                    <span class="welcome">{{__('menu.Apply your information')}}</span>
                                </div>
                                <!-- End# Head Title -->
                                <!-- Contact form -->

                                    <form id="registeration_form" method="post" >
                                    @csrf
                                    <!-- Form Group -->
                                        <div class="form-group">


                                                        <input type="text" name="username" value="{{old('username')}}" onkeyup="userRegistrationValidate()" style="color: white" id="username_register" class="form-control text" placeholder="{{__('menu.Full Name *')}}" required />
                                            <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="username_required"  >{{__('menu.Please Enter UserName')}} </span>
                                                {{--  <div class="col-md-6 col-sm-4 col-sx-12">
                                                    <!-- Element -->
                                                    <div class="element">
                                                      <input type="text" name="email" value="{{old('email')}}" class="form-control text" placeholder="E-mail *" />
                                                    </div>
                                                    <!-- End Element -->
                                                  </div>--}}


{{--                                            <input id="phone" type="tel" name="phone" />--}}
                                            <input id="phone" type="tel" name="phone" onkeyup="userRegistrationValidate()" class="form-control" placeholder="50xxxxxxx" style="padding-right: 135px;color: white" required>
                                            <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="phone_required"  >{{__('menu.Please Enter Phone Number')}}</span>
                                            <span id="valid-msg" style="color: greenyellow" class="hide">Valid</span>
                                            <span id="error-msg" style="color:red;" class="hide">Invalid number</span>

                                                {{--                  <div class="col-md-4 col-sm-4 col-sx-12">--}}
                                                {{--                    <!-- Element -->--}}
                                                {{--                    <div class="element">--}}
                                                {{--                      <select class="form-control" name="country">--}}
                                                {{--                        <option value="">Country...</option>--}}
                                                {{--                        <option value="AF">Afghanistan</option>--}}
                                                {{--                        <option value="AL">Albania</option>--}}
                                                {{--                        <option value="DZ">Algeria</option>--}}
                                                {{--                        <option value="AS">American Samoa</option>--}}
                                                {{--                        <option value="AD">Andorra</option>--}}
                                                {{--                        <option value="AG">Angola</option>--}}
                                                {{--                        <option value="AI">Anguilla</option>--}}
                                                {{--                        <option value="AG">Antigua &amp; Barbuda</option>--}}
                                                {{--                        <option value="AR">Argentina</option>--}}
                                                {{--                        <option value="AA">Armenia</option>--}}
                                                {{--                        <option value="AW">Aruba</option>--}}
                                                {{--                        <option value="AU">Australia</option>--}}
                                                {{--                        <option value="AT">Austria</option>--}}
                                                {{--                        <option value="AZ">Azerbaijan</option>--}}
                                                {{--                        <option value="BS">Bahamas</option>--}}
                                                {{--                        <option value="BH">Bahrain</option>--}}
                                                {{--                        <option value="BD">Bangladesh</option>--}}
                                                {{--                        <option value="BB">Barbados</option>--}}
                                                {{--                        <option value="BY">Belarus</option>--}}
                                                {{--                        <option value="BE">Belgium</option>--}}
                                                {{--                        <option value="BZ">Belize</option>--}}
                                                {{--                        <option value="BJ">Benin</option>--}}
                                                {{--                        <option value="BM">Bermuda</option>--}}
                                                {{--                        <option value="BT">Bhutan</option>--}}
                                                {{--                        <option value="BO">Bolivia</option>--}}
                                                {{--                        <option value="BL">Bonaire</option>--}}
                                                {{--                        <option value="BA">Bosnia &amp; Herzegovina</option>--}}
                                                {{--                        <option value="BW">Botswana</option>--}}
                                                {{--                        <option value="BR">Brazil</option>--}}
                                                {{--                        <option value="BC">British Indian Ocean Ter</option>--}}
                                                {{--                        <option value="BN">Brunei</option>--}}
                                                {{--                        <option value="BG">Bulgaria</option>--}}
                                                {{--                        <option value="BF">Burkina Faso</option>--}}
                                                {{--                        <option value="BI">Burundi</option>--}}
                                                {{--                        <option value="KH">Cambodia</option>--}}
                                                {{--                        <option value="CM">Cameroon</option>--}}
                                                {{--                        <option value="CA">Canada</option>--}}
                                                {{--                        <option value="IC">Canary Islands</option>--}}
                                                {{--                        <option value="CV">Cape Verde</option>--}}
                                                {{--                        <option value="KY">Cayman Islands</option>--}}
                                                {{--                        <option value="CF">Central African Republic</option>--}}
                                                {{--                        <option value="TD">Chad</option>--}}
                                                {{--                        <option value="CD">Channel Islands</option>--}}
                                                {{--                        <option value="CL">Chile</option>--}}
                                                {{--                        <option value="CN">China</option>--}}
                                                {{--                        <option value="CI">Christmas Island</option>--}}
                                                {{--                        <option value="CS">Cocos Island</option>--}}
                                                {{--                        <option value="CO">Colombia</option>--}}
                                                {{--                        <option value="CC">Comoros</option>--}}
                                                {{--                        <option value="CG">Congo</option>--}}
                                                {{--                        <option value="CK">Cook Islands</option>--}}
                                                {{--                        <option value="CR">Costa Rica</option>--}}
                                                {{--                        <option value="CT">Cote D'Ivoire</option>--}}
                                                {{--                        <option value="HR">Croatia</option>--}}
                                                {{--                        <option value="CU">Cuba</option>--}}
                                                {{--                        <option value="CB">Curacao</option>--}}
                                                {{--                        <option value="CY">Cyprus</option>--}}
                                                {{--                        <option value="CZ">Czech Republic</option>--}}
                                                {{--                        <option value="DK">Denmark</option>--}}
                                                {{--                        <option value="DJ">Djibouti</option>--}}
                                                {{--                        <option value="DM">Dominica</option>--}}
                                                {{--                        <option value="DO">Dominican Republic</option>--}}
                                                {{--                        <option value="TM">East Timor</option>--}}
                                                {{--                        <option value="EC">Ecuador</option>--}}
                                                {{--                        <option value="EG">Egypt</option>--}}
                                                {{--                        <option value="SV">El Salvador</option>--}}
                                                {{--                        <option value="GQ">Equatorial Guinea</option>--}}
                                                {{--                        <option value="ER">Eritrea</option>--}}
                                                {{--                        <option value="EE">Estonia</option>--}}
                                                {{--                        <option value="ET">Ethiopia</option>--}}
                                                {{--                        <option value="FA">Falkland Islands</option>--}}
                                                {{--                        <option value="FO">Faroe Islands</option>--}}
                                                {{--                        <option value="FJ">Fiji</option>--}}
                                                {{--                        <option value="FI">Finland</option>--}}
                                                {{--                        <option value="FR">France</option>--}}
                                                {{--                        <option value="GF">French Guiana</option>--}}
                                                {{--                        <option value="PF">French Polynesia</option>--}}
                                                {{--                        <option value="FS">French Southern Ter</option>--}}
                                                {{--                        <option value="GA">Gabon</option>--}}
                                                {{--                        <option value="GM">Gambia</option>--}}
                                                {{--                        <option value="GE">Georgia</option>--}}
                                                {{--                        <option value="DE">Germany</option>--}}
                                                {{--                        <option value="GH">Ghana</option>--}}
                                                {{--                        <option value="GI">Gibraltar</option>--}}
                                                {{--                        <option value="GB">Great Britain</option>--}}
                                                {{--                        <option value="GR">Greece</option>--}}
                                                {{--                        <option value="GL">Greenland</option>--}}
                                                {{--                        <option value="GD">Grenada</option>--}}
                                                {{--                        <option value="GP">Guadeloupe</option>--}}
                                                {{--                        <option value="GU">Guam</option>--}}
                                                {{--                        <option value="GT">Guatemala</option>--}}
                                                {{--                        <option value="GN">Guinea</option>--}}
                                                {{--                        <option value="GY">Guyana</option>--}}
                                                {{--                        <option value="HT">Haiti</option>--}}
                                                {{--                        <option value="HW">Hawaii</option>--}}
                                                {{--                        <option value="HN">Honduras</option>--}}
                                                {{--                        <option value="HK">Hong Kong</option>--}}
                                                {{--                        <option value="HU">Hungary</option>--}}
                                                {{--                        <option value="IS">Iceland</option>--}}
                                                {{--                        <option value="IN">India</option>--}}
                                                {{--                        <option value="ID">Indonesia</option>--}}
                                                {{--                        <option value="IA">Iran</option>--}}
                                                {{--                        <option value="IQ">Iraq</option>--}}
                                                {{--                        <option value="IR">Ireland</option>--}}
                                                {{--                        <option value="IM">Isle of Man</option>--}}
                                                {{--                        <option value="IL">Israel</option>--}}
                                                {{--                        <option value="IT">Italy</option>--}}
                                                {{--                        <option value="JM">Jamaica</option>--}}
                                                {{--                        <option value="JP">Japan</option>--}}
                                                {{--                        <option value="JO">Jordan</option>--}}
                                                {{--                        <option value="KZ">Kazakhstan</option>--}}
                                                {{--                        <option value="KE">Kenya</option>--}}
                                                {{--                        <option value="KI">Kiribati</option>--}}
                                                {{--                        <option value="NK">Korea North</option>--}}
                                                {{--                        <option value="KS">Korea South</option>--}}
                                                {{--                        <option value="KW">Kuwait</option>--}}
                                                {{--                        <option value="KG">Kyrgyzstan</option>--}}
                                                {{--                        <option value="LA">Laos</option>--}}
                                                {{--                        <option value="LV">Latvia</option>--}}
                                                {{--                        <option value="LB">Lebanon</option>--}}
                                                {{--                        <option value="LS">Lesotho</option>--}}
                                                {{--                        <option value="LR">Liberia</option>--}}
                                                {{--                        <option value="LY">Libya</option>--}}
                                                {{--                        <option value="LI">Liechtenstein</option>--}}
                                                {{--                        <option value="LT">Lithuania</option>--}}
                                                {{--                        <option value="LU">Luxembourg</option>--}}
                                                {{--                        <option value="MO">Macau</option>--}}
                                                {{--                        <option value="MK">Macedonia</option>--}}
                                                {{--                        <option value="MG">Madagascar</option>--}}
                                                {{--                        <option value="MY">Malaysia</option>--}}
                                                {{--                        <option value="MW">Malawi</option>--}}
                                                {{--                        <option value="MV">Maldives</option>--}}
                                                {{--                        <option value="ML">Mali</option>--}}
                                                {{--                        <option value="MT">Malta</option>--}}
                                                {{--                        <option value="MH">Marshall Islands</option>--}}
                                                {{--                        <option value="MQ">Martinique</option>--}}
                                                {{--                        <option value="MR">Mauritania</option>--}}
                                                {{--                        <option value="MU">Mauritius</option>--}}
                                                {{--                        <option value="ME">Mayotte</option>--}}
                                                {{--                        <option value="MX">Mexico</option>--}}
                                                {{--                        <option value="MI">Midway Islands</option>--}}
                                                {{--                        <option value="MD">Moldova</option>--}}
                                                {{--                        <option value="MC">Monaco</option>--}}
                                                {{--                        <option value="MN">Mongolia</option>--}}
                                                {{--                        <option value="MS">Montserrat</option>--}}
                                                {{--                        <option value="MA">Morocco</option>--}}
                                                {{--                        <option value="MZ">Mozambique</option>--}}
                                                {{--                        <option value="MM">Myanmar</option>--}}
                                                {{--                        <option value="NA">Nambia</option>--}}
                                                {{--                        <option value="NU">Nauru</option>--}}
                                                {{--                        <option value="NP">Nepal</option>--}}
                                                {{--                        <option value="AN">Netherland Antilles</option>--}}
                                                {{--                        <option value="NL">Netherlands (Holland, Europe)</option>--}}
                                                {{--                        <option value="NV">Nevis</option>--}}
                                                {{--                        <option value="NC">New Caledonia</option>--}}
                                                {{--                        <option value="NZ">New Zealand</option>--}}
                                                {{--                        <option value="NI">Nicaragua</option>--}}
                                                {{--                        <option value="NE">Niger</option>--}}
                                                {{--                        <option value="NG">Nigeria</option>--}}
                                                {{--                        <option value="NW">Niue</option>--}}
                                                {{--                        <option value="NF">Norfolk Island</option>--}}
                                                {{--                        <option value="NO">Norway</option>--}}
                                                {{--                        <option value="OM">Oman</option>--}}
                                                {{--                        <option value="PK">Pakistan</option>--}}
                                                {{--                        <option value="PW">Palau Island</option>--}}
                                                {{--                        <option value="PS">Palestine</option>--}}
                                                {{--                        <option value="PA">Panama</option>--}}
                                                {{--                        <option value="PG">Papua New Guinea</option>--}}
                                                {{--                        <option value="PY">Paraguay</option>--}}
                                                {{--                        <option value="PE">Peru</option>--}}
                                                {{--                        <option value="PH">Philippines</option>--}}
                                                {{--                        <option value="PO">Pitcairn Island</option>--}}
                                                {{--                        <option value="PL">Poland</option>--}}
                                                {{--                        <option value="PT">Portugal</option>--}}
                                                {{--                        <option value="PR">Puerto Rico</option>--}}
                                                {{--                        <option value="QA">Qatar</option>--}}
                                                {{--                        <option value="ME">Republic of Montenegro</option>--}}
                                                {{--                        <option value="RS">Republic of Serbia</option>--}}
                                                {{--                        <option value="RE">Reunion</option>--}}
                                                {{--                        <option value="RO">Romania</option>--}}
                                                {{--                        <option value="RU">Russia</option>--}}
                                                {{--                        <option value="RW">Rwanda</option>--}}
                                                {{--                        <option value="NT">St Barthelemy</option>--}}
                                                {{--                        <option value="EU">St Eustatius</option>--}}
                                                {{--                        <option value="HE">St Helena</option>--}}
                                                {{--                        <option value="KN">St Kitts-Nevis</option>--}}
                                                {{--                        <option value="LC">St Lucia</option>--}}
                                                {{--                        <option value="MB">St Maarten</option>--}}
                                                {{--                        <option value="PM">St Pierre &amp; Miquelon</option>--}}
                                                {{--                        <option value="VC">St Vincent &amp; Grenadines</option>--}}
                                                {{--                        <option value="SP">Saipan</option>--}}
                                                {{--                        <option value="SO">Samoa</option>--}}
                                                {{--                        <option value="AS">Samoa American</option>--}}
                                                {{--                        <option value="SM">San Marino</option>--}}
                                                {{--                        <option value="ST">Sao Tome &amp; Principe</option>--}}
                                                {{--                        <option value="SA">Saudi Arabia</option>--}}
                                                {{--                        <option value="SN">Senegal</option>--}}
                                                {{--                        <option value="RS">Serbia</option>--}}
                                                {{--                        <option value="SC">Seychelles</option>--}}
                                                {{--                        <option value="SL">Sierra Leone</option>--}}
                                                {{--                        <option value="SG">Singapore</option>--}}
                                                {{--                        <option value="SK">Slovakia</option>--}}
                                                {{--                        <option value="SI">Slovenia</option>--}}
                                                {{--                        <option value="SB">Solomon Islands</option>--}}
                                                {{--                        <option value="OI">Somalia</option>--}}
                                                {{--                        <option value="ZA">South Africa</option>--}}
                                                {{--                        <option value="ES">Spain</option>--}}
                                                {{--                        <option value="LK">Sri Lanka</option>--}}
                                                {{--                        <option value="SD">Sudan</option>--}}
                                                {{--                        <option value="SR">Suriname</option>--}}
                                                {{--                        <option value="SZ">Swaziland</option>--}}
                                                {{--                        <option value="SE">Sweden</option>--}}
                                                {{--                        <option value="CH">Switzerland</option>--}}
                                                {{--                        <option value="SY">Syria</option>--}}
                                                {{--                        <option value="TA">Tahiti</option>--}}
                                                {{--                        <option value="TW">Taiwan</option>--}}
                                                {{--                        <option value="TJ">Tajikistan</option>--}}
                                                {{--                        <option value="TZ">Tanzania</option>--}}
                                                {{--                        <option value="TH">Thailand</option>--}}
                                                {{--                        <option value="TG">Togo</option>--}}
                                                {{--                        <option value="TK">Tokelau</option>--}}
                                                {{--                        <option value="TO">Tonga</option>--}}
                                                {{--                        <option value="TT">Trinidad &amp; Tobago</option>--}}
                                                {{--                        <option value="TN">Tunisia</option>--}}
                                                {{--                        <option value="TR">Turkey</option>--}}
                                                {{--                        <option value="TU">Turkmenistan</option>--}}
                                                {{--                        <option value="TC">Turks &amp; Caicos Is</option>--}}
                                                {{--                        <option value="TV">Tuvalu</option>--}}
                                                {{--                        <option value="UG">Uganda</option>--}}
                                                {{--                        <option value="UA">Ukraine</option>--}}
                                                {{--                        <option value="AE">United Arab Emirates</option>--}}
                                                {{--                        <option value="GB">United Kingdom</option>--}}
                                                {{--                        <option value="US">United States of America</option>--}}
                                                {{--                        <option value="UY">Uruguay</option>--}}
                                                {{--                        <option value="UZ">Uzbekistan</option>--}}
                                                {{--                        <option value="VU">Vanuatu</option>--}}
                                                {{--                        <option value="VS">Vatican City State</option>--}}
                                                {{--                        <option value="VE">Venezuela</option>--}}
                                                {{--                        <option value="VN">Vietnam</option>--}}
                                                {{--                        <option value="VB">Virgin Islands (Brit)</option>--}}
                                                {{--                        <option value="VA">Virgin Islands (USA)</option>--}}
                                                {{--                        <option value="WK">Wake Island</option>--}}
                                                {{--                        <option value="WF">Wallis &amp; Futana Is</option>--}}
                                                {{--                        <option value="YE">Yemen</option>--}}
                                                {{--                        <option value="ZR">Zaire</option>--}}
                                                {{--                        <option value="ZM">Zambia</option>--}}
                                                {{--                        <option value="ZW">Zimbabwe</option>--}}
                                                {{--                      </select>--}}
                                                {{--                    </div>--}}
                                                {{--                    <!-- End Element -->--}}
                                                {{--                  </div>--}}
                                                {{--                  <div class="col-md-6 col-sm-4 col-sx-12">--}}
                                                {{--                    <!-- Element -->--}}
                                                {{--                    <div class="element">--}}
                                                {{--                      <input type="text" name="city" value="{{old('city')}}" class="form-control text" placeholder="City" />--}}
                                                {{--                    </div>--}}
                                                {{--                    <!-- End Element -->--}}
                                                {{--                  </div>--}}



                                                        <input type="password" onkeyup="userRegistrationValidate()" name="password" id="password_register"  class="form-control text" placeholder="{{__('menu.PASSWORD *')}}" style="    margin-top: 10px;color: white" required />
                                            <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="password_required"  >{{__('menu.Please Enter Password')}} </span>
                                                        <input type="password" name="password_confirm"  style="color: white" id="password_confirm_register" class="form-control text" onkeyup="checkPasswords()" placeholder="{{__('menu.CONFIRM PASSWORD *')}}" required />
{{--                                            <span class="text-danger" style="font-size: 20px;--}}
{{--    color: #ff000c;display: none" id="password_confirm_required"  >Please Enter passwords  </span>--}}
                                            <span class="text-danger" style="font-size: 20px;
    color: #ff000c;display: none" id="all_required"  >{{__('menu.Please Enter Required Inputs')}}</span>
                                            <div style="    margin: 20px;">
                                                    <span id="passwords_register" style="color: #ff0500;font-size: 20px;display: none" >{{__('menu.PASSWORDS NOT MATCHING')}}</span>
                                                </div>
                                            <br>

                                                <!-- Element -->
{{--                                                <div class="wrap-input100 validate-input container-fluid" style="float: left" >--}}
{{--                                                    <input type="checkbox" name="remember_me" value="1" onclick="policyCondition()" style="color: white" class="form-check-input " id="policycheck" required>--}}
{{--                                                    <span class="form-check-label" for="policycheck" style="color: white"> {{__('menu.ACCEPT TERMS AND CONDITIONS')}}</span>--}}
{{--                                                </div>--}}


                                            <!-- End form group -->
                                            <!-- Element -->
                                            @if(session()->has("error"))
                                                <div class="alert alert-danger">
                                                    <span>{{session()->get("error")}}</span>
                                                </div>
                                            @endif
                                            <br><br>
                                            <a href="{{route("userLogin")}}" style="font-size: 16px;color: #ffffff" >{{__('menu.Already Has an Account')}} </a><br>
<br>

                                            <div class="">
                                                <input onclick="userRegistration()"  type="button"   value="{{__('menu.SEND')}}" id="send_register"    class="btn " style="background-color:{{$settings->theme_colour}};color: white;width: 50%;
    height: 45px;"/>
                                                <div class="loading"></div>
                                            </div>
                                        </div>
                                        <!-- End Element -->
                                    </form>
                                    <div class="done mt30"> <strong>Thank you!</strong> We have received your message. </div>

                                <!-- End contact form -->
                            </div>

                    <!-- End Slider content -->
                </div>
                <!-- End Bg Transparent -->
            </div>
            <!-- End Full Bg -->
            <div class="modal" tabindex="-1" role="dialog" id="t_c_modal" style="color: black">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: black">TERMS & CONDITIONS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3 class="message" style="color: black">by accepting on theses terms</h3>
                            <P>The key terms and conditions identified should have been addressed before the contractor started the security strengthening construction work.The key terms and conditions identified should have been addressed before the contractor started the security strengthening construction work.</P>

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: black">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Full Screen BG -->
        <!-- Header Sticky One page
          ============================================= -->
        <header id="header" class="header-transparent">
            <div class="container">
                <div class="row">
                    <div id="main-menu-trigger"><i class="fa fa-bars"></i></div>
                    <!-- Logo
                                ============================================= -->
                    <div id="logo"> <a href="/" class="light-logo"><img src="{{url($settings->header_logo)}}" alt="Logo" style="height:50px"></a> <a href="/" class="dark-logo"><img src="{{$settings->header_logo}}" alt="Logo" style="width:125px"></a> </div>
                    <!-- #logo end -->
                    <!-- Primary Navigation
                                ============================================= -->
                    <nav id="main-menu" class="">
                        @include('layouts.menu')

                    </nav>
                    <!-- #main-menu end -->
                </div>
            </div>
        </header>

        <!-- REQUIRED CDN  -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <!-- End Header Sticky One Page -->
@include('layouts.footer')

