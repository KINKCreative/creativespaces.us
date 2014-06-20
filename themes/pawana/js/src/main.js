$(document).foundation();

$(document).ready(function(){
  if($(".faq").length) {
    count = 1;
    dd = "";
    $(".faq h3").each(function() {
        answer = ($(this).next("p").html());
        question = $(this).html();
        dd = dd + '<dd class="accordion-navigation"><a href="#panel'+count+'"><strong>'+question+'</strong></a><div id="panel'+count+'" class="content">'+answer+'</div></dd>';
        count++;
    });
    $(".faq").html('<dl class="accordion" data-accordion>'+dd+'</dl>');
    $(document).foundation('reflow','accordion');
  }
});