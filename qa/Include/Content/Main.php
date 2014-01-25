<?php
$Biz = $SiteObj->getAllBiz();
				//include_once 'Include/AllBiz.php';
				$i=0;
				echo '<div id="BizCategoryPage" class="FirstPage">';
				while($Biz[$i] != null)
				{
					if ($i == 30)
					{
						?>
						</div>
						<div id="BizCategoryPage" class="SecondPage" style="display:none;">
						<?php
					}
					?>
					<div id="BizCard" onClick='window.location = "Biz&Biz=<?php echo $Biz[$i]['Title'];?>";' style="cursor:pointer;background-image:url(images/Cards/<?php echo $Biz[$i]['image'];?>);">
						<div id="BizLinkCard">
						<a href="Biz&Biz=<?php echo $Biz[$i]['Title'];?>" alt="<?php echo $Biz[$i]['Name'];?>">בחר</a>
						</div>
						<div id="BizHeadlineCard">
							<a href="Biz&Biz=<?php echo $Biz[$i]['Title'];?>"><?php echo $Biz[$i]['Name'];?></a>
						</div>
					</div>
					<?php
					$i++;
				}
				?>
				</div>
				<div id="MovePage"><a onClick="ChangePage();">הבא</a></div>
				<script type="text/javascript">
				function ChangePage()
				{
					if($('.FirstPage').css('display') == 'block')
					{
						$('.FirstPage').hide();
						$('.SecondPage').fadeIn('slow');
						$('#MovePage').html('<a onClick="ChangePage();">הקודם</a>');
					}
					else
					{
						$('.SecondPage').hide();
						$('.FirstPage').fadeIn('slow');
						$('#MovePage').html('<a onClick="ChangePage();">הבא</a>');
					}
				}
				</script>