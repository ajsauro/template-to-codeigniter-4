import {swipe} from '/assets/js/swipeBanner.js';

async function loadHomeData(){
    //var bannerHome = document.querySelector('._bannerHome');
    var recent = document.querySelector('._recent');
    var categoryCulture = document.querySelector('._category_culture');
    var categoryBusiness = document.querySelector('._category_business');
    //var categoryLifeStyle = document.querySelector('._category_lifestyle');
    var theSection = [
        document.querySelector('._bannerHome'),
        document.querySelector('._category_lifestyle'),
    ];
/** Usando Promise.all
    const responses = await Promise.all([
        await fetch('/banner/home',{method:'get'}),
        await fetch('/trendings',{method:'get'}),
        await fetch('/recent',{method:'get'}),
        await fetch('/category/culture',{method:'get'}),
        await fetch('/category/business',{method:'get'}),
        await fetch('/category/lifestyle',{method:'get'}),
    ]);

    const bannerHtml = await responses[0].text();
    const trendingHtml = await responses[1].text();
    const recentHtml = await responses[2].text();
    const categoryCultureHtml = await responses[3].text();
    const categoryBusinessHtml = await responses[4].text();
    const categoryLifeStyleHtml = await responses[5].text();

    bannerHome.innerHTML = bannerHtml;
    recent.innerHTML = recentHtml;

    var trending = document.querySelector('._trending');
    trending.innerHTML = trendingHtml;

    categoryCulture.innerHTML = categoryCultureHtml;
    categoryBusiness.innerHTML = categoryBusinessHtml;
    categoryLifeStyle.innerHTML = categoryLifeStyleHtml;
*/
//
    const theData = [];
    // !! Load Banner Home
    theData[0] = await fetch('/banner/home',{method:'get'});
//    const dataBanner = await fetch('/banner/home',{method:'get'});
//    const bannerHtml = await dataBanner.text();
    const bannerHtml = await theData[0].text();
    //bannerHome.innerHTML = bannerHtml;
    theSection[0].innerHTML = bannerHtml;

    swipe('.sliderFeaturedPosts');

    // !! Load Recent
    //const dataRecent = await fetch('/recent',{method:'get'});
//    const recentHtml = await dataRecent.text();
    theData[1] = await fetch('/recent',{method:'get'});
    const recentHtml = await theData[1].text();
    recent.innerHTML = recentHtml;

    // !! Load Trending
    var trending = document.querySelector('._trending');
    const dataTrending = await fetch('/trendings',{method:'get'});
    const trendingHtml = await dataTrending.text();
    trending.innerHTML = trendingHtml;

    // !! Load Category Culture
    const dataCategoryCulture = await fetch('/category/partials/culture',{method:'get'});
    const categoryCultureHtml = await dataCategoryCulture.text();
    categoryCulture.innerHTML = categoryCultureHtml;

    // !! Load Category Business
    const dataCategoryBusiness = await fetch('/category/partials/business',{method:'get'});
    const categoryBusinessHtml = await dataCategoryBusiness.text();
    categoryBusiness.innerHTML = categoryBusinessHtml;

    // !! Load Category Life Style
    const dataCategoryLifeStyle = await fetch('/category/partials/lifestyle',{method:'get'});
    const categoryLifeStyleHtml = await dataCategoryLifeStyle.text();
    //categoryLifeStyle.innerHTML = categoryLifeStyleHtml;
    theSection[1].innerHTML = categoryLifeStyleHtml;
  }

  loadHomeData();
