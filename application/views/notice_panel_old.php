<?php $notices = $this->db->query("SELECT description FROM notice WHERE status=1 ORDER BY id DESC")->result(); ?>

<!-- Notice panel -->
<div class="container-fluid p-0" style="background-color:#1e1e1e;">
    <!-- NEW -->
    <div class="container-fluid row ml-0 mr-0 pr-0 pl-0" style="background: white;font-size: 16px;" id="news_scroller">
        <span id="clock" class="col-md-1 bg-black pt-15" style="text-align: center; color:white;">
            <p id="date_clock"></p><p id="time_clock"></p>
        </span>
        <p class="marquee col-md-11 p-10 m-0" style="width: 94%;">
            <span style="color:red; font-size: 18px;" class="slow">
            	<b style='color:#f02727'>
            		<?php
            			$arr = [];
            			foreach($notices as $not) {
            				$arr[] = $not->description;
            			}
            			echo implode(" *** ", $arr);
            		?>
            	</b>
            </span>
        </p>
    </div>
</div>
