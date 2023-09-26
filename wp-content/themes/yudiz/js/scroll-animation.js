if (jQuery('#we-are-animation').hasClass('scroll-anim')) {
  var animation = bodymovin.loadAnimation({
    container: document.getElementById('we-are-animation'), // Required
    path: 'wp-content/themes/yudiz/animation-data/we-are-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: false, // Optional
    name: "We Are Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#web-animation').hasClass('scroll-anim')) {
  var animation1 = bodymovin.loadAnimation({
    container: document.getElementById('web-animation'), // Required
    path: site_object.theme_url+'/animation-data/web-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "Web Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#game-animation').hasClass('scroll-anim')) {
  var animation2 = bodymovin.loadAnimation({
    container: document.getElementById('game-animation'), // Required
    path: site_object.theme_url+'/animation-data/game-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "Game Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#design-animation').hasClass('scroll-anim')) {
  var animation3 = bodymovin.loadAnimation({
    container: document.getElementById('design-animation'), // Required
    path: site_object.theme_url+'/animation-data/design-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "Design Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#app-animation').hasClass('scroll-anim')) {
  var animation4 = bodymovin.loadAnimation({
    container: document.getElementById('app-animation'), // Required
    path: site_object.theme_url+'/animation-data/app-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "App Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#blockchain-animation').hasClass('scroll-anim')) {
  var animation5 = bodymovin.loadAnimation({
    container: document.getElementById('blockchain-animation'), // Required
    path: site_object.theme_url+'/animation-data/blockchain-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "Blockchain Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#ar-vr-animation').hasClass('scroll-anim')) {
  var animation6 = bodymovin.loadAnimation({
    container: document.getElementById('ar-vr-animation'), // Required
    path: site_object.theme_url+'/animation-data/ar-vr-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "AR/VR Animation", // Name for future reference. Optional.
  });
}
if (jQuery('#ai-ml-animation').hasClass('scroll-anim')) {
  var animation6 = bodymovin.loadAnimation({
    container: document.getElementById('ai-ml-animation'), // Required
    path: site_object.theme_url+'/animation-data/ai-ml-animation/data.json', // Required
    renderer: 'svg', // Required
    loop: true, // Optional
    autoplay: true, // Optional
    name: "AI/ML Animation", // Name for future reference. Optional.
  });
}