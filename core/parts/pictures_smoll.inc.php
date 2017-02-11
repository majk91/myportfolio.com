<?php 
			if($data){
				foreach ($data as $key => $value) {
					foreach ($data[$key] as $keys => $val) {
						if ($i==0) {
							if($keys == 'url'){
								$print.='<div class="item active">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="'.$val.'">';
							}else{
								$print.='<img src="file_upload/gallery_mobile/'.$val.'" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>';
							}
						}else{
							if($keys == 'url'){
								$print.='<div class="item">	
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="'.$val.'">';
							}else{
								$print.='<img src="file_upload/gallery_mobile/'.$val.'" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>';
							}
						}
					$i++;
					}
				}
			}
			if ($i==0) {
				$print.='<div class="item active">
					<div class="myWork-item">
						<div class="row">
							<div class="col-xs-12">
								<div class="myWork-item-wrap">
									<p><a href="#"><img src="image/template-work.png" alt="mySite"></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>';
			}
 ?>