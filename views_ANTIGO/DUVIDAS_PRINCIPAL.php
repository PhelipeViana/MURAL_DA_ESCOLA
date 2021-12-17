<style>
body{
    background:#eee;
    margin-top:20px;
}
.widget {
    padding: 0;
    margin-top: 0;
    margin-bottom: 0;
    border-radius: 6px;
    -webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
    box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
}
.widget.box .widget-header {
    background: #fff;
    padding: 0px 8px 0px;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}
.widget .widget-header {
    border-bottom: 0px solid #f1f2f3;
}
.widget.box .widget-header {
    background: #fff;
    padding: 0px 8px 0px;
    border-top-right-radius: 6px;
    border-top-left-radius: 6px;
}
.widget .widget-header {
    border-bottom: 0px solid #f1f2f3;
}
.widget .widget-header:after {
    clear: both;
}
.widget .widget-header:before, .widget .widget-header:after {
    display: table;
    content: "";
    line-height: 0;
}
.widget-content-area {
    padding: 20px;
    position: relative;
    background-color: #fff;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
}
.widget-content-pergunta {
    padding: 20px;
    position: relative;
    background-color: #fff;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    background-color: #E1DBDB;
    margin-bottom: 10px;
}
.widget-content-resposta {
    padding: 20px;
    position: relative;
    background-color: #fff;
    border-bottom-left-radius: 6px;
    border-bottom-right-radius: 6px;
    background-color: #BEF6DC;
    margin-bottom: 10px;
}

.statbox .widget-content:before, .statbox .widget-content:after {
    display: table;
    content: "";
    line-height: 0;
    clear: both;
}
.statbox .widget-content:before, .statbox .widget-content:after {
    display: table;
    content: "";
    line-height: 0;
    clear: both;
}



.story-container-2 .single-story {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}
.story-container-2 .single-story:hover {
    background: #517cf4;
    color: #fff;

}

.story-container-2 .story-dp {
    height: 50px;
    width: 50px;
    position: relative;
    border-radius: 50%;
    margin-right: 15px;
    padding: 3px;
}

.story-container-2 .story-dp img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.story-container-2 .story-author p.name {
    margin-bottom: 0px;
    font-weight: 600;
    font-size: 13px;
}
.story-container-2 .story-author p.time {
    margin-bottom: 0px;
    font-weight: 500;
    font-size: 12px;
}
.story-container-2 .story-dp img.add-story {
    position: absolute;
    height: 19px !important;
    width: 19px !important;
    right: -3px;
}
.story-container-2 .story-dp img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.story-container-2 p.divider {
    margin: 10px 0px 10px 0px;
    font-weight: 600;
    font-size: 12px;
    color: #404040;
}
.widget.box .widget-footer {
    padding: 2rem 2.25rem;
    background-color: #ffffff;
    border-top: 1px solid #EBEDF3;
}
.bg-light-primary {
    background-color: #f6f1ff!important;
    border-color: #f6f1ff;
    color: #5526ab;
}
/*caixa personalizada*/
.story-container-3 .story-dp {
    height: 50px;
    width: 50px;
    position: relative;
    border-radius: 50%;
    margin-right: 15px;
    padding: 3px;
}
.story-container-3 .story-dp img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}


</style>
<div class="container">
    <div class="row">
        <div class="col-lg-4 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 class="pb-0">DÚVIDAS</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="content_2" class="tabcontent"> 
                                <div class="story-container-2">
                                    <p class="divider">RESPONDIDO</p>
                                    <div class="single-story">
                                        <div class="story-dp unseen">
                                            <img src="ALUNOS/img/faces/card-profile1-square.jpg">
                                        </div>
                                        <div class="story-author">
                                            <p class="name">Fred</p>
                                            <p class="time">Matemática 1</p>
                                        </div>
                                    </div>
                                    <div class="single-story">
                                        <div class="story-dp unseen">
                                            <img src="ALUNOS/img/faces/card-profile2-square.jpg">
                                        </div>
                                        <div class="story-author">
                                            <p class="name">Sergio</p>
                                            <p class="time">Quimica</p>
                                        </div>
                                    </div>
                                    <p class="divider">Disponiveis</p>
                                    <div class="single-story">
                                        <div class="story-dp seen">
                                            <img src="ALUNOS/img/faces/marc.jpg">
                                        </div>
                                        <div class="story-author">
                                            <p class="name">Alfredo Souza</p>
                                            <p class="time">Embriologia</p>
                                        </div>
                                    </div>                             
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 layout-spacing">
            <!-- inicio lateral -->
            <?php

            for($i=1;$i < 15;$i++){
                ?>

                <div class="widget-content widget-content-pergunta">
                    <div class="story-container-3">
                        <div class="single-story" id="foum">
                            <div class="row">
                              <div class="col-md-12">
                                <h3 class="text-center">Pergunta <?=15-$i?></h3>
                                Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Laboriosam neque assumenda illum magni numquam nulla, totam eos omnis beatae repellat nihil accusantium dolor, consequuntur tempora. Amet, similique aliquam ea voluptatibus.
                                Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Laboriosam neque assumenda illum magni numquam nulla, totam eos omnis beatae repellat nihil accusantium dolor, consequuntur tempora. Amet, similique aliquam ea voluptatibus.
                                <p>
                                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> 14/05/21 15:43:55</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-resposta">
                <div class="story-container-3">
                    <div class="single-story" id="foum">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="story-dp unseen">
                                    <img src="ALUNOS/img/faces/card-profile1-square.jpg">
                                    <p class="name">Fred</p>
                                </div>
                            </div>
                            <div class="col-md-11">
                                 <h3 class="text-center">Reposta <?=15-$i?></h3>
                                Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Laboriosam neque assumenda illum magni numquam nulla, totam eos omnis beatae repellat nihil accusantium dolor, consequuntur tempora. Amet, similique aliquam ea voluptatibus.
                                Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Laboriosam neque assumenda illum magni numquam nulla, totam eos omnis beatae repellat nihil accusantium dolor, consequuntur tempora. Amet, similique aliquam ea voluptatibus.
                                <p>
                                   <span><i class="fa fa-clock-o" aria-hidden="true"></i> 14/05/21 21:33:02</span>
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <?php
       }

       ?>

       <!-- fim lateral -->
   </div>
</div>
</div>