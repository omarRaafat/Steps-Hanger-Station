<template>
    <div class="home">

      <link rel="stylesheet" 
        href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" 
        crossorigin="anonymous">
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

        <section class="bg-primary-3 text-white pb-0 o-hidden">
            <div class="container" v-if="this.$route.params.lang == 'ar'" style="direction:rtl;">
                <div class="row justify-content-between align-items-center" v-for="setting in settings" :key="setting.id">
                  <div class="col-xl-5 col-lg-6 text-center text-lg mb-4 mb-md-5 mb-lg-0" data-aos="fade-right">
                      <p class="lead" style="direction:rtl;" v-html="setting.breif_ar"></p>
                      <router-link :to="`/${i18n.locale}/pricing`" class="nav-item" exact>
                          <a class="btn btn-lg" style="background-color:#6653ff;border-color:#301b72;color:#fff;height:55px;width:200px;border-radius:26px;"><span style="position:relative;top:3px;">{{ $t('header.Subscribe Now') }}</span></a>
                      </router-link>
                  </div>
                <!-- <div class="col" data-aos="fade-left" data-aos-delay="250">
                    <img :src="'assets/img/desktop-app/desktop-app-2.jpg'" alt="Screenshot" class="img-fluid rounded shadow-lg border">
                </div> -->
                </div>
            </div>

            <div class="container" v-else style="direction:ltr;">
                <div class="row justify-content-between align-items-center" v-for="setting in settings" :key="setting.id">
                <div class="col-xl-5 col-lg-6 text-center text-lg mb-4 mb-md-5 mb-lg-0" data-aos="fade-left">
                    <p class="lead" style="direction:ltr;" v-html="setting.breif_en"></p>
                    <router-link :to="`/${i18n.locale}/pricing`" class="nav-item" exact>
                        <a class="btn btn-lg" style="background-color:#6653ff;border-color:#301b72;color:#fff;height:55px;width:200px;border-radius:26px;"><span style="position:relative;top:3px;">{{ $t('header.Subscribe Now') }}</span></a>
                    </router-link>
                </div>
                <!-- <div class="col" data-aos="fade-left" data-aos-delay="250">
                    <img :src="'assets/img/desktop-app/desktop-app-2.jpg'" alt="Screenshot" class="img-fluid rounded shadow-lg border">
                </div> -->
                </div>
            </div>


            <div class="w-50 h-50 bottom left position-absolute" v-if="this.$route.params.lang == 'ar'" data-jarallax-element="50" style="position:relative;left:-290px">
                <div class="blob blob-2 bg-gradient w-100 h-100" style="background:linear-gradient(to right, #301b72, #6653ff) !important;"></div>
            </div>
            <div class="w-50 h-50 bottom right position-absolute" v-else data-jarallax-element="50">
                <div class="blob blob-2 bg-gradient w-100 h-100" style="background:linear-gradient(to right, #301b72, #6653ff) !important;"></div>
            </div>
            <!-- <div class="w-50 h-50 bottom right position-absolute" data-jarallax-element="75">
                <div class="blob blob-4 bg-white opacity-10 w-100 h-100"></div>
            </div> -->
            
            <div class="divider divider-bottom bg-white" style="height:80px;"></div>
        </section>

        <!-- sub_services -->

        <section style="background-color:#fff;padding-top:130px;padding-bottom:0px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h4 class="display-3 text-center" style="color:#6653ff;font-family:abo;font-size:40px;">{{ $t('Ease. Safe. Fast') }}</h4>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h5 style="color:#948f8f;font-family:al;" class="text-center">{{ $t('With the Steps system') }}</h5>
              </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row parent" data-aos="fade-up" data-aos-delay="250" v-if="this.$route.params.lang == 'ar'">
              <div class="col-md-2 text-center imageSubService" v-for="sub_service in sub_services" :key="sub_service.id">
                <img :src="'/uploads/'+sub_service.image" width="50px" height="50px" alt="experiement" />
                <p id="subServiceTitle" style="color:#948f8f;font-family:al;font-size:19px;padding-top:10px;">{{ sub_service.title_ar }}</p>
              </div>
            </div>
            <div class="row parent" data-aos="fade-up" data-aos-delay="250" v-else>
              <div class="col-md-2 text-center imageSubService" v-for="sub_service in sub_services" :key="sub_service.id">
                <img :src="'/uploads/'+sub_service.image" width="50px" height="50px" alt="experiement" />
                <p style="color:#948f8f;font-family:al;font-size:18px;padding-top:10px;">{{ sub_service.title_en }}</p>
              </div>
            </div>
          </div>
          <div id="about-us"></div>
        </section>

        <!-- about_us -->

        <section style="background-color:#fff;padding-bottom:20px;direction:rtl;" v-if="this.$route.params.lang == 'ar'">
          <div class="container">
            <div class="row" v-for="setting in settings" :key="setting.id">
              <div class="col-md-6">
                <img :src="'/uploads/'+setting.about_us_image" data-aos="fade-up" data-aos-delay="250" id="scroll-to1" class="imageAboutUs object" width="500px" height="350px" alt="">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="paragraphAboutUsAr" data-aos="fade-down" data-aos-delay="250">
                  <h4 style="font-family:abo;color:#6653ff;direction:rtl;text-align:start;font-size:30px;">{{ $t('about.What') }}</h4>
                  {{ setting.about_us_ar }}
                </div>
              </div>
            </div>
            <div id="why-steps"></div>
          </div>
        </section>

        <section style="background-color:#fff;padding-bottom:20px;direction:ltr;" v-else>
          <div class="container">
            <div class="row" v-for="setting in settings" :key="setting.id">
              <div class="col-md-6">
                <img :src="'/uploads/'+setting.about_us_image" data-aos="fade-up" data-aos-delay="250" id="scroll-to1" class="imageAboutUs object" width="500px" height="350px" alt="">
              </div>
              <div class="col-md-6 d-flex align-items-center">
                <div class="paragraphAboutUsEn" data-aos="fade-down" data-aos-delay="250">
                  <h4 style="font-family:abo;color:#6653ff;direction:ltr;text-align:start;font-size:30px;">{{ $t('about.What') }}</h4>
                  {{ setting.about_us_en }}
                </div>
              </div>
            </div>
            <div id="why-steps"></div>
          </div>
        </section>

        <!-- why steps -->

        <section style="direction:rtl;padding-top:30px;" v-if="this.$route.params.lang == 'ar'">
            <div class="container">
                <div class="row">
                  <div class="col-md-8 mb-3 mb-md-0" data-aos="fade-down" data-aos-delay="250">
                    <h4 class="whyStepHeading">{{ $t('Why.WhySteps') }}</h4>
                      <ul class="fahmyUl">
                        <li class="d-flex align-items-start" style="margin-bottom:25px;" v-for="(whyStep,index) in whySteps" :key="whyStep.id">
                          <div class="borderNumberWhySteps">
                            <span style="color:#fff;font-size:18px;">{{index+1}}</span>
                          </div>
                          <p class="fahmyLi">{{whyStep.title_ar}}</p>
                        </li>
                      </ul>
                  </div>
                  <div class="col-md-4" v-for="setting in settings" :key="setting.id">
                    <img :src="'/uploads/'+setting.why_steps_image" class="imageWhySteps object" id="scroll-to2" data-aos="fade-up" data-aos-delay="250" width="500px" height="350px" alt="">
                  </div>
                </div>
                <div id="benefit-steps"></div>
            </div>
        </section>

        <section style="direction:ltr;padding-top:30px;" v-else>
            <div class="container">
                <div class="row">
                  <div class="col-md-8 mb-3 mb-md-0" data-aos="fade-down" data-aos-delay="250">
                    <h4 class="whyStepHeadingEn">{{ $t('Why.WhySteps') }}</h4>
                      <ul class="fahmyUlEn">
                        <li class="d-flex align-items-start" style="margin-bottom:25px;" v-for="(whyStep,index) in whySteps" :key="whyStep.id">
                          <div class="borderNumberWhySteps">
                            <span style="color:#fff;font-size:18px;">{{index+1}}</span>
                          </div>
                          <p class="fahmyLiEn">{{whyStep.title_en}}</p>
                        </li>
                      </ul>
                  </div>
                  <div class="col-md-4" v-for="setting in settings" :key="setting.id">
                    <img :src="'/uploads/'+setting.why_steps_image" class="imageWhyStepsEn object" id="scroll-to2" data-aos="fade-up" data-aos-delay="250" width="500px" height="350px" alt="">
                  </div>
                </div>
                <div id="benefit-steps"></div>
            </div>
        </section>


        <!-- benifits -->

      <section class="text-white" style="direction:rtl;padding-top:40px !important;padding-bottom:50px;" v-if="this.$route.params.lang == 'ar'">
        <div class="container">
          <div class="row section-title justify-content-center text-center mb-4">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4" style="color:#6653ff;font-family:abo;font-size:40px;">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body cardBenifit onHoverCard">
                <img :src="'/uploads/'+benifit.image" alt="Utosia logo" class="icon icon-lg ml-3">
                <h5 class="mt-4 text-center cardBenifitTitle">{{ benifit.title_ar }}</h5>
              </div>
              <br>
            </div>
          </div>
        </div>
        
        <div class="divider divider-bottom"></div>
      </section>

      <section class="text-white" style="direction:ltr;padding-top:40px !important;padding-bottom:50px;" v-else>
        <div class="container">
          <div class="row section-title justify-content-center text-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
              <h3 class="display-4" style="color:#6653ff;font-family:abo;font-size:40px;">{{ $t('beneifit.Benifits') }}</h3>
            </div>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-4 mb-3 mb-md-0" v-for="benifit in benifits" :key="benifit.id">
              <div class="card card-body cardBenifit onHoverCard">
                <img :src="'/uploads/'+benifit.image" alt="Utosia logo" class="icon icon-lg ml-3">
                <h5 class="mt-4 text-center cardBenifitTitle">{{ benifit.title_en }}</h5>
              </div>
              <br>
            </div>
          </div>
        </div>
        <div id="why-steps"></div>
        <div class="divider divider-bottom"></div>
      </section>


        <!-- sections -->

        <section style="padding-top:0px !important" v-if="this.$route.params.lang == 'ar'">
          <div class="container" v-for="(section,index) in sections" :key="section.id">
            <div class="row parent" v-if="(index+1)%2 == 0">
              <div class="col-md-6 sectionsCssAr" data-aos="fade-up" data-aos-delay="250">
                <h4 class="HeadingSection">{{ section.title_ar }}</h4>
                <br>
                <p class="ParagraphSection">{{ section.desc_ar }}</p>
              </div>
              <div class="col-md-6" data-aos="fade-down" data-aos-delay="250">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="" style="box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);border-radius:1rem;">
              </div>
            </div>

            <div class="row" v-else>
              <div class="col-md-6" data-aos="fade-down" data-aos-delay="250">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="" style="box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);border-radius:1rem;">
              </div>
              <div class="col-md-6 sectionsCssAr" data-aos="fade-up" data-aos-delay="250">
                <h4 class="HeadingSection">{{ section.title_ar }}</h4>
                <br>
                <p class="ParagraphSection">{{ section.desc_ar }}</p>
              </div>
            </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          </div>
        </section>

        <section style="padding-top:0px !important" v-else>
          <div class="container" v-for="(section,index) in sections" :key="section.id">
            <div class="row parent" v-if="(index+1)%2 == 0">
              <div class="col-md-6 sectionsCssAr" data-aos="fade-up" data-aos-delay="250">
                <h4 class="HeadingSectionEn">{{ section.title_en }}</h4>
                <br>
                <p class="ParagraphSectionEn">{{ section.desc_en }}</p>
              </div>
              <div class="col-md-6" data-aos="fade-down" data-aos-delay="250">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="" style="box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);border-radius:1rem;">
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-md-6" data-aos="fade-down" data-aos-delay="250">
                <img :src="'/uploads/'+section.image" class="newImageOrders" width="500px" height="350px" alt="" style="box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);border-radius:1rem;">
              </div>
              <div class="col-md-6 sectionsCssAr" data-aos="fade-up" data-aos-delay="250">
                <h4 class="HeadingSectionEn">{{ section.title_en }}</h4>
                <br>
                <p class="ParagraphSectionEn">{{ section.desc_en }}</p>
              </div>
            </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          </div>
        </section>

    </div>
</template>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script>
  $(document).ready(function(){
    AOS.init();
  });
</script>
<script>
import $ from 'jquery';
import axios from 'axios';
import i18n from "../I18n.js";
import * as home_service from "../services/home_service";
export default {
    name:"Home",
    data: function(){
        return {
            i18n,
            settings:[],
            benifits:[],
            whySteps:[],
            sub_services:[],
            sections:[]
        }
    },
    mounted(){
      this.getSettings();
      this.getBenifits();
      this.getWhySteps();
      this.getSubServices();
      this.getSections();
      this.checkOffsetScroll();
    },
    methods: {
      getSettings:async function(){
        try{
          const response = await home_service.getSettings();
          this.settings = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getBenifits:async function(){
        try{
          const response = await home_service.getBenifits();
          this.benifits = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getWhySteps:async function(){
        try{
          const response = await home_service.getWhySteps();
          this.whySteps = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getSubServices:async function(){
        try{
          const response = await home_service.getSubServices();
          this.sub_services = response.data;
        }catch(error){
          console.log(error);
        }
      },
      getSections:async function(){
        try{
          const response = await home_service.getSections();
          this.sections = response.data;
        }catch(error){
          console.log(error);
        }
      },
      checkOffsetScroll(){
        $(window).scroll(function() {
          var hT = $('#scroll-to1').offset().top,
              hH = $('#scroll-to1').outerHeight(),
              wH = $(window).height(),
              wS = $(this).scrollTop();
          if (wS > (hT+hH-wH)){
              setTimeout(function(){
                $('#scroll-to1').removeClass('object');
              } , 5000);
          }

          var hT2 = $('#scroll-to2').offset().top,
              hH2 = $('#scroll-to2').outerHeight(),
              wH2 = $(window).height(),
              wS2 = $(this).scrollTop();
          if (wS2 > (hT2+hH2-wH2)){
              setTimeout(function(){
                $('#scroll-to2').removeClass('object');
              } , 5000);
          }

        });
      }
    },
}
</script>

<style scoped>
.ParagraphSection{
  font-size:23px;
  direction:rtl;
  text-align:justify;
  color:#948f8f;
  font-family:al;
}
.ParagraphSectionEn{
  font-size:23px;
  direction:ltr;
  text-align:justify;
  color:#948f8f;
  font-family:al;
}
.HeadingSection{
  text-align:start;
  font-family:abo;
  direction:rtl;
  color:#6653ff;
}
.HeadingSectionEn{
  text-align:start;
  font-family:abo;
  direction:ltr;
  color:#6653ff;
}
.imageSubService:hover{
  position:relative;
  -webkit-animation:glide 0.7s ease-in-out alternate infinite;
  transition: box-shadow 0.3s ease-in-out;
}
.onHoverCard:hover{
  position:relative;
   -webkit-animation:glide 0.7s ease-in-out alternate infinite;
   -webkit-box-shadow: 6px 9px 22px -4px rgba(111,110,117,1);
-moz-box-shadow: 6px 9px 22px -4px rgba(111,110,117,1);
box-shadow: 6px 9px 22px -4px rgba(111,110,117,1);
transition: box-shadow 0.3s ease-in-out;
}
/* .imageSubService{
  transition: transform .7s ease-in-out;
}
.imageSubService:hover{
  transform: rotate(360deg);
} */
.object{
    position:relative;
   -webkit-animation:glide 0.7s ease-in-out alternate infinite;
}
@-webkit-keyframes glide  {
   from {
      left:0px;
      top:0px;
   }
   
   to {
      left:0px;
      top:20px;
   }

}
.cardBenifitTitle{
  color:#6653ff;
  font-family:ap;
}
.cardBenifit{
  height:193px;
  box-shadow:0px 0px 5px 1px rgb(0 0 0 / 15%);
}
.imageWhyStepsEn{
  position:relative;
  top:30px;
}
.whyStepHeadingEn{
  color:#6653ff;
  font-family:abo;
  text-align:start;
  direction:ltr;
  position:relative;
  font-size:30px;
  top:70px;
  right:-37px;
}
.whyStepHeading{
  color:#6653ff;
  font-family:abo;
  text-align:start;
  direction:rtl;
  position:relative;
  font-size:30px;
  top:70px;
  right:37px;
}
.fahmyUl{
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    list-style:none;
    column-gap:90px;
    padding-top:110px;
}
.fahmyUlEn{
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    list-style:none;
    column-gap:90px;
    padding-top:110px;
}
.fahmyLi{
  position:relative;
  right:20px;
  top:5px;
}
.fahmyLiEn{
  position:relative;
  right:-20px;
  font-size:14px;
  top:5px;
}
.sectionsCssAr{
  position:relative;
  top:90px;
}
.paragraphAboutUsAr{
  text-align:justify;
  line-height:2;
  direction:rtl;
}
.paragraphAboutUsEn{
  text-align:justify;
  line-height:2;
  direction:ltr;
}
.stepsTagRtl{
  font-size: 45px;
  position:relative;
  right:-10px
}
.stepsTagLtr{
  font-size: 45px;
  position:relative;
  right:10px
}
.fahmicoBtn:hover{
  background-color:#301b72;
  border-color:#6653ff;
  color:#fff;
}

.btnOfReadMore{
  background-color:#6653ff;
  font-family:ap;
  color:#fff;
  width:350px;
  height:65px;
  border-radius:36px;
}
.borderNumberWhySteps{
  border:1px solid #AA52FF;
  padding:5px;
  height:32px;
  background-color:#AA52FF;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
  width:25px;
  text-align:center;
}

@media screen and (min-width: 1025px) and (max-width: 1340px){
  .imageWhySteps{
    width: 400px;
    height: 300px;
  }
  .imageWhyStepsEn{
    width: 400px;
    height: 300px;
  }
  .fahmyLi{
    position:relative;
    right:20px;
    font-size:13px;
  }
  .fahmyLiEn{
    position:relative;
    right:-20px;
    font-size:13px;
  }
}

@media only screen and (width : 1024px){
  .newImageOrders{
    width:450px;
    height:350px;
  }
  .imageWhySteps{
    width: 400px;
    height: 300px;
    position: relative;
    top: 15px;
    right: -50px;
  }
  .imageWhyStepsEn{
    width: 300px;
    height: 250px;
    position: relative;
    top: 90px;
    right: 0px;
  }
  .fahmyLi{
    position:relative;
    right:15px;
    font-size:14px;
  }
  .fahmyLiEn{
    position:relative;
    right:-15px;
    font-size:12px;
  }
  .fahmyUl{
    column-gap:50px;
  }
  .fahmyUlEn{
    column-gap:50px;
  }
}

@media screen and (min-width:768px) and (max-width:1000px) {
  .imageAboutUs{
    width:360px;
    height:330px;
  }
  .imageWhySteps{
    width: 290px;
    height: 250px;
    position: relative;
    top: 130px;
    right: -27px;
  }
  .imageWhyStepsEn{
    width: 245px;
    height: 210px;
    position: relative;
    top: 200px;
    right: 30px;
  }
  .newImageOrders{
    width:340px;
    height:340px;
  }
  .fahmyLi{
    position:relative;
    right:15px;
    font-size:14px;
  }
  .fahmyLiEn{
    position:relative;
    right:-15px;
    font-size:14px;
  }
  .cardBenifitTitle{
    font-size:16px;
  }
}

@media (max-width: 500px){
  .ParagraphSection{
    position:relative;
    right:0px;
    width:330px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:0px;
    width:330px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-15px;
    width:330px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-15px;
    width:340px;
  }
  .parent{
    flex-direction: column-reverse;
  }
  .btnOfReadMore{
    width:250px;
  }
  .imageAboutUs{
    width:350px;
    height:250px;
  }
  .paragraphAboutUsAr{
    text-align:justify;
  }
  .paragraphAboutUsEn{
    text-align:justify;
  }
  .imageWhySteps{
    width:350px;
    height:250px;
  }
  .imageWhyStepsEn{
    width:350px;
    height:250px;
  }
  .newImageOrders{
    width:320px;
    height:200px;
    position:relative;
    right:-13px;
  }
  .sectionsCssAr{
    position:relative;
    top:10px;
  }
  .fahmyLi{
    position:relative;
    right:0px;
    font-size:12px;
  }
  .fahmyLiEn{
    position:relative;
    right:-20px;
    font-size:12px;
  }
  .whyStepHeading{
    position:relative;
    right:0px;
  }
  .fahmyUl{
    column-gap:40px;
    position:relative;
    right:-15px;
  }
  .fahmyUlEn{
    column-gap:40px;
    position:relative;
    right:30px;
  }
  .whyStepHeadingEn{
    position: relative;
    right: 0px;
  }
}

@media only screen and (width: 414px){
  .ParagraphSection{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right: -25px;
    width: 330px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:340px;
  }
  .newImageOrders{
    width:340px;
    height:200px;
    position:relative;
    right:-23px;
  }
  .fahmyLi{
    position:relative;
    right:5px;
    font-size:15px;
  }
  .fahmyLiEn{
    position:relative;
    right:-10px;
    font-size:12px;
  }
}

@media only screen and (width: 412px){
  .ParagraphSection{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:330px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:340px;
  }
  .newImageOrders{
    width:340px;
    height:200px;
    position:relative;
    right:-23px;
  }
  .fahmyLi{
    position:relative;
    right:2px;
    font-size:14px;
  }
  .fahmyLiEn{
    position:relative;
    right:-10px;
    font-size:13.5px;
  }
}

@media only screen and (width: 411px){
  .ParagraphSection{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:330px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:340px;
  }
  .newImageOrders{
    width:340px;
    height:200px;
    position:relative;
    right:-23px;
  }
  .fahmyLi{
    position:relative;
    right:2px;
    font-size:14px;
  }
  .fahmyLiEn{
    position:relative;
    right:-10px;
    font-size:13.5px;
  }
}

@media only screen and (width: 393px){
  .ParagraphSection{
    position:relative;
    right:-5px;
    width:330px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:-5px;
    width:330px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-25px;
    width:330px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-25px;
    width:340px;
  }
  .newImageOrders{
    width:320px;
    height:200px;
    position:relative;
    right:-23px;
  }
  .fahmyLi{
    position:relative;
    right:2px;
    font-size:12px;
  }
  .fahmyLiEn{
    position:relative;
    right:-10px;
    font-size:12px;
  }
  .imageAboutUs{
    width:350px;
    height:250px;
  }
}

@media only screen and (width: 360px){
  .ParagraphSection{
    position:relative;
    right: -5px;
    width: 300px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:-5px;
    width:300px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-15px;
    width:300px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-15px;
    width:300px;
  }
  .newImageOrders{
    width:300px;
    height:200px;
  }
  .imageAboutUs{
    width:300px;
    height:200px;
  }
  .fahmyLiEn{
    font-size:10px;
  }
  .imageWhyStepsEn{
    width:300px;
    height:200px;
  }
}

@media only screen and (width: 320px){
  .ParagraphSection{
    position:relative;
    right:-15px;
    width:250px;
  }
  .HeadingSection{
    padding-top:20px;
    position:relative;
    right:-15px;
    width:250px;
  }
  .ParagraphSectionEn{
    position:relative;
    right:-15px;
    width:250px;
  }
  .HeadingSectionEn{
    padding-top:20px;
    position:relative;
    right:-15px;
    width:260px;
  }
  .newImageOrders{
    width:260px;
    height:200px;
  }
  .fahmyLi{
    position:relative;
    right:3px;
    font-size:9px;
  }
  .fahmyLiEn{
    position:relative;
    right:-10px;
    font-size:9px;
  }
  .imageAboutUs{
    width:300px;
    height:200px;
  }
  .imageWhyStepsEn{
    width:300px;
    height:200px;
  }
}

.container .fahmyCard{
  height:250px;
  background-color:#fff;
  /* border: 2px solid rgba(0 , 0 , 0 , 0.125); */
  -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
  -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
  box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
}
.container .card .face{ 
    /* width: 300px;  */
    height: 200px; 
    transition: 0.5s; /*Transition time*/
}
.container .card .face.face1{
    position: relative; 
    background: #fff;
    display: flex; 
    justify-content: center; 
    align-items: center; 
    z-index: 1; 
    transform: translateY(100px); /*2D conversion, Y axis movement*/
} 
.container .card:hover .face.face1{ /*Here is the content 1 reset when the card label is hovered*/
    background: #6653ff;
    transform: translateY(0); 
}
.container .card .face.face1 .content{
    opacity: 1; /*transparency*/
    transition: 0.5s; 
}
.container .card:hover .face.face1 .content{ /*Here is the transparency of the cover when hovering the card label*/
    opacity: 1; /*transparency*/
}
.container .fahmyCard:hover{
  background:#fff;
}
.container .card .face.face1 .content h3{
    margin: 10px 0 0; 
    padding: 0; 
    color:#6653ff; 
    text-align: center; /*Font centered*/
    font-size: 1.5em; /*font size*/
}
.container .card:hover .face.face1 .content h3{
    margin: 10px 0 0; 
    padding: 0; 
    color:#fff; 
    text-align: center; /*Font centered*/
    font-size: 1.5em; /*font size*/
}
.container .card .face.face2{
    position: relative; 
    background: #fff; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 20px; 
    box-sizing: border-box; /*Set the layout inside the box model, here is the inner margin box border of the element will not affect the final size */
    box-shadow: 0px 0px 0px; /*shadow*/
    transform: translateY(-100px); /*2D conversion, Y axis movement*/
}
.container .card:hover .face.face2{ /*Here is the content 2 reset when the card label is hovered*/
    transform: translateY(0px);
    background: #6653ff;
}
.container .card:hover .face.face2 h5{ /*Here is the content 2 reset when the card label is hovered*/
    color:#6653ff;
}
.container .card .face.face2 h5{
    margin: 0; 
    padding: 0;
    color:#fff;

    /* -webkit-box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%);
-moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.15);
box-shadow: 0px 0px 5px 1px rgb(0 0 0 / 15%); */
}

</style>