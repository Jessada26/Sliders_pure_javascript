<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div id="body" class="dto">
        <div class="home-product-new-hldr">
        <div class="slider-btn-hldr slider-btn-hldr-left">
            <button id="left-btn" class="slider-btn" style="display: none;">
            <svg viewBox="0 0 256 256">
                <polyline fill="none" stroke="black" stroke-width="16" points="184,16 72,128 184,240"></polyline>
            </svg>
        </button>
        </div>
        <div class="home-product-new">
            <div class="home-grid products-grid products-grid--max-4" style="left: 0px;">
    
          
               <?php
                         $count_posts = wp_count_posts( 'product&category=กล่องบรรจุภัณฑ์-packagingbox2' );
                            $params = array(
                                'posts_per_page' => $count_posts->publish,
                                'product_cat' => 'กล่องบรรจุภัณฑ์-packagingbox2',
                                'post_type' => 'product',
                                'orderby' => 'desc');
                            $wc_query = new WP_Query($params);
                            ?>
                            <?php if ($wc_query->have_posts()) : ?>
                                <?php while ($wc_query->have_posts()) :
                                    $wc_query->the_post(); ?>
      
    
                 <div class="item-container">
                    <div class="item">
                    <a href="<?php the_permalink(); ?>">
                    <amp-img
                               width="253"
                               height="253"
                               layout="intrinsic"
                           src="<?php the_post_thumbnail_url(); ?>">
                    </amp-img></a>
                    </div>
                 </div>
    
                  <?php endwhile; ?>
                                 <?php wp_reset_postdata(); ?>
                             <?php else: ?>
    
                                <?php _e('No Products'); ?>
    
                            <?php endif; ?>
    
     
          
              
                </div>
        </div>
        <div class="slider-btn-hldr slider-btn-hldr-right">
            <button id="right-btn" class="slider-btn" style="display: block;">
            <svg viewBox="0 0 256 256">
                <polyline fill="none" stroke="black" stroke-width="16" points="72,16 184,128 72,240"></polyline>
            </svg>
           </button>
        </div>
       </div>
       </div>
    
</body>
</html>

<script>
    //Now fri 16 jul 2021
    (function(){
class TheSlNa {
  constructor(myDto) {
     this.outDto =document.querySelectorAll('.dto')[myDto];
     this.listEl = this.outDto.querySelector('.home-grid.products-grid.products-grid--max-4');
     this.btnLeftEl = this.outDto.querySelector('#left-btn');
     this.btnRightEl = this.outDto.querySelector('#right-btn');
     this.count = 0;
  }

slideImages(dir){
   this.totalChildren = this.listEl.querySelectorAll(".item").length;
   dir === "left" ? ++this.count : --this.count;
   this.btnLeftEl.style.display="block";
   //this.listEl.style.left = this.count * 286 + 'px';
   //this.btnLeftEl.style.display = this.count < 0 ? "block" : "none";
   // Here, 4 is the number displayed at any given time
   //this.btnRightEl.style.display = this.count > 4-this.totalChildren ? "block" : "none";
 }

 updateListItemCards() {
     this.listSrc = this.outDto.querySelectorAll('.home-grid.products-grid.products-grid--max-4 .item-container').length;
 }

 async setRightClick() {
    await this.updateListItemCards(); 
    if (this.listSrc>3) {
      this.ftInnerHtml = this.outDto.querySelectorAll('.item-container')[0].innerHTML;
      this.createDiv = document.createElement('div');
      await this.createDiv.classList.add('item-container');
      await this.outDto.querySelector('.home-grid.products-grid.products-grid--max-4').appendChild(this.createDiv);  
      this.outDto.querySelectorAll('.home-grid.products-grid.products-grid--max-4 .item-container')[this.listSrc].innerHTML=this.ftInnerHtml;
      await this.outDto.querySelectorAll('.item-container')[0].remove();
    }
 }

 async setLeftClick() {
  await this.updateListItemCards(); 
  if (this.listSrc>3) {
   this.oldElementStatic = this.outDto.querySelector('.home-grid.products-grid.products-grid--max-4');
   await this.outDto.querySelectorAll('.item-container')[this.listSrc-1].remove();
   this.createDiv = document.createElement('div');
   await this.createDiv.classList.add('item-container');
   await this.oldElementStatic.insertBefore(this.createDiv, this.oldElementStatic.firstChild);
   this.outDto.querySelectorAll('.home-grid.products-grid.products-grid--max-4 .item-container')[0].innerHTML=this.ftInnerHtml;
   this.ftInnerHtml = this.outDto.querySelectorAll('.item-container')[this.listSrc-1].innerHTML;
  }
 }

//  async function autoSlideMe(getDelayTime) {
//   await this.outDto.querySelector("#right-btn").click();
//   setTimeout(this.autoSlideMe.bind(this), getDelayTime);
//  }
}

let setOutDto1 = new TheSlNa(0);
//setOutDto1.autoSlideMe(5000);
setOutDto1.btnLeftEl.addEventListener("click", async function(e) {
  await setOutDto1.setLeftClick();
  await setOutDto1.slideImages("left");
});
setOutDto1.btnRightEl.addEventListener("click", async function (e) { 
  await setOutDto1.setRightClick();
  await setOutDto1.slideImages("right");
});




let setOutDto2 = new TheSlNa(1);
//setOutDto2.autoSlideMe(4000);
setOutDto2.btnLeftEl.addEventListener("click", async function(e) {
  await setOutDto2.setLeftClick();
  await setOutDto2.slideImages("left");
});
setOutDto2.btnRightEl.addEventListener("click", async function(e) {
  await setOutDto2.setRightClick();
  await setOutDto2.slideImages("right");
});

 async function autoSlideMe() {
  await document.querySelectorAll('.dto')[0].querySelector("#right-btn").click();
  await document.querySelectorAll('.dto')[1].querySelector("#right-btn").click();
  setTimeout(autoSlideMe, 5000);
 }
 autoSlideMe();

})();
</script>