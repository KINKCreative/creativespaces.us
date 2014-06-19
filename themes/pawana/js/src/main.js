$(document).foundation();

$(document).ready(function() {
  if(!typeof(faqdata)==='undefined') {
  faq = $.parseJSON(faqdata);

  count=0;
  nav = "";
  faq.forEach(function(f) {
      alert(f);
    count++;
          active = "";
          if(count==1) { active = "active"; }
    fid = "panel"+count;
    nav += '<dd><a href="#'+fid+'">'+f[0]+'</a><div id="'+fid+'" class="content '+active+'">'+f[1]+'</div></a></dd>';
  });

  $(".faq").html('<dl class="accordion" data-accordion>'+nav+'</dl>');
}
})