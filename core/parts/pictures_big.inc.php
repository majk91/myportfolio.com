<?php					

			if($data){
				foreach ($data as $key => $value) {
					foreach ($data[$key] as $keys => $val) {
						if($i==0){
							if($keys == 'url'){
								$print .='<div class="item active">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="'.$val.'">';
							}else{
								$print .='<img src="file_upload/gallery_desctop/'.$val.'" alt="mySite"></a></p>
												</div>
											</div>';
							}
						}else if($i%8==0){
							if($keys == 'url'){
								$print .='<div class="col-xs-4 col-md-4">
											<div class="myWork-item-wrap">
												<p><a href="'.$val.'">';
							}else{
								$print .='<img src="file_upload/gallery_desctop/'.$val.'" alt="mySite"></a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="myWork-item">
									<div class="row">';
							}					
						}else{
							if($keys == 'url'){
								$print .='<div class="col-xs-4 col-md-4">
								<div class="myWork-item-wrap">
									<p><a href="'.$val.'">';
							}else{
								$print .='<img src="file_upload/gallery_desctop/'.$val.'" alt="mySite"></a></p>
											</div>
										</div>';
							}
						}
					} 
					$i++;
				}
			}
			if($i==0){
				$print .='<div class="item active">
						<div class="myWork-item">
							<div class="row">';
				};
			if($i%9 || $i<9 ){
				$j=$i%9;
				while($j<9) {
					$print .= '<div class="col-xs-4 col-md-4">
							<div class="myWork-item-wrap">
								<p><a href="#"><img src="image/template-work.png" alt="mySite"></a></p>
							</div>
						</div>';
					$j++;
				}
				$print .= '</div>
					</div>
				</div>';
			}

  ?>