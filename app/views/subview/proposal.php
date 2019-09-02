<?php 
/**
 * Proposal Page (proposal.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$proposal_id = crm\Routes::getServerRequest('proposal/id/');
$proposal_id = stripcslashes($proposal_id);

echo $proposal_id;

?>
<!-- Bleh -->
<link rel="stylesheet" href="/app/includes/js/quill/quill.css">
<link rel="stylesheet" href="/app/includes/js/quill/quill.snow.css">
<script src="/app/includes/js/quill/quill.min.js"></script>

<style>
	.theProposalEditor { height: 500px; }
</style>

<div class="container editProposalPage">
	
	<div class="wrapper">

		<div class="row debugInformation">
			<span>Debug Information</span>
		</div>
		
		<!-- Header -->
		<div class="row proposalHeader clearfix"></div>

		<!-- Editor -->
		<div class="row proposalEditor clearfix">
			<div class="theProposalToolbar">

				<span class="ql-formats">
					<button type="button" class="ql-bold">
						<svg viewBox="0 0 18 18"> 
							<path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
							 <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> 
						</svg>
					</button>
					<button type="button" class="ql-italic">
						<svg viewBox="0 0 18 18">
							<line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> 
							<line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> 
							<line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> 
						</svg>
					</button>
					<button type="button" class="ql-underline">
						<svg viewBox="0 0 18 18"> 
							<path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
							<rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> 
						</svg>
					</button>
					<button type="button" class="ql-strike">
						<svg viewBox="0 0 18 18"> 
							<line class="ql-stroke ql-thin" x1="15.5" x2="2.5" y1="8.5" y2="9.5"></line> 
							<path class="ql-fill" d="M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z"></path> 
							<path class="ql-fill" d="M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z"></path> 
						</svg>
					</button>
				</span>

				<select class="ql-font">
					<option selected>Aref Ruqaa</option>
					<option value="roboto">Roboto</option>
				</select>

				<span class="ql-formats">
					<button type="button" class="ql-blockquote">
						<svg viewBox="0 0 18 18">
							<rect class="ql-fill ql-stroke" height="3" width="3" x="4" y="5"></rect>
							<rect class="ql-fill ql-stroke" height="3" width="3" x="11" y="5"></rect>
							<path class="ql-even ql-fill ql-stroke" d="M7,8c0,4.031-3,5-3,5"></path>
							<path class="ql-even ql-fill ql-stroke" d="M14,8c0,4.031-3,5-3,5"></path>
						</svg>
					</button>
					<button type="button" class="ql-code-block">
						<svg viewBox="0 0 18 18">
							<polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
							<polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
							<line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
						</svg>
					</button>
				</span>

				<span class="ql-formats">
					<span class="ql-header ql-picker">
						<span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-1">
							<svg viewBox="0 0 18 18">
								<polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
								<polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
							</svg>
						</span>
						<span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-1">
							<span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="3"></span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="4"></span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="5"></span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="6"></span>
							<span tabindex="0" role="button" class="ql-picker-item ql-selected"></span>
						</span>
					</span>
					<select class="ql-header" style="display: none;">
						<option value="1"></option>
						<option value="2"></option>
						<option value="3"></option>
						<option value="4"></option>
						<option value="5"></option>
						<option value="6"></option>
						<option selected="selected"></option>
					</select>
				</span>

				<span class="ql-formats">
					<button type="button" class="ql-script" value="sub">
						<svg viewBox="0 0 18 18">
							<path class="ql-fill" d="M15.5,15H13.861a3.858,3.858,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.921,1.921,0,0,0,12.021,11.7a0.50013,0.50013,0,1,0,.957.291h0a0.914,0.914,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.076-1.16971,1.86982-1.93971,2.43082A1.45639,1.45639,0,0,0,12,15.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,15Z"></path>
							<path class="ql-fill" d="M9.65,5.241a1,1,0,0,0-1.409.108L6,7.964,3.759,5.349A1,1,0,0,0,2.192,6.59178Q2.21541,6.6213,2.241,6.649L4.684,9.5,2.241,12.35A1,1,0,0,0,3.71,13.70722q0.02557-.02768.049-0.05722L6,11.036,8.241,13.65a1,1,0,1,0,1.567-1.24277Q9.78459,12.3777,9.759,12.35L7.316,9.5,9.759,6.651A1,1,0,0,0,9.65,5.241Z"></path>
						</svg>
					</button>
					<button type="button" class="ql-script" value="super">
						<svg viewBox="0 0 18 18">
							<path class="ql-fill" d="M15.5,7H13.861a4.015,4.015,0,0,0,1.914-2.975,1.8,1.8,0,0,0-1.6-1.751A1.922,1.922,0,0,0,12.021,3.7a0.5,0.5,0,1,0,.957.291,0.917,0.917,0,0,1,1.053-.725,0.81,0.81,0,0,1,.744.762c0,1.077-1.164,1.925-1.934,2.486A1.423,1.423,0,0,0,12,7.5a0.5,0.5,0,0,0,.5.5h3A0.5,0.5,0,0,0,15.5,7Z"></path>
							<path class="ql-fill" d="M9.651,5.241a1,1,0,0,0-1.41.108L6,7.964,3.759,5.349a1,1,0,1,0-1.519,1.3L4.683,9.5,2.241,12.35a1,1,0,1,0,1.519,1.3L6,11.036,8.241,13.65a1,1,0,0,0,1.519-1.3L7.317,9.5,9.759,6.651A1,1,0,0,0,9.651,5.241Z"></path>
						</svg>
					</button>
				</span>

				<span class="ql-formats">
					<span class="ql-align ql-picker ql-icon-picker ql-expanded">
						<span class="ql-picker-label" tabindex="0" role="button" aria-expanded="true" aria-controls="ql-picker-options-5">
							<svg viewBox="0 0 18 18">
								<line class="ql-stroke" x1="3" x2="15" y1="9" y2="9"></line>
								<line class="ql-stroke" x1="3" x2="13" y1="14" y2="14"></line>
								<line class="ql-stroke" x1="3" x2="9" y1="4" y2="4"></line>
							</svg>
						</span>
						<span class="ql-picker-options" aria-hidden="false" tabindex="-1" id="ql-picker-options-5">
							<span tabindex="0" role="button" class="ql-picker-item">
								<svg viewBox="0 0 18 18">
									<line class="ql-stroke" x1="3" x2="15" y1="9" y2="9"></line>
									<line class="ql-stroke" x1="3" x2="13" y1="14" y2="14"></line>
									<line class="ql-stroke" x1="3" x2="9" y1="4" y2="4"></line>
								</svg>
							</span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="center">
								<svg viewBox="0 0 18 18">
									<line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
									<line class="ql-stroke" x1="14" x2="4" y1="14" y2="14"></line>
									<line class="ql-stroke" x1="12" x2="6" y1="4" y2="4"></line>
								</svg>
							</span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="right">
								<svg viewBox="0 0 18 18">
									<line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
									<line class="ql-stroke" x1="15" x2="5" y1="14" y2="14"></line>
									<line class="ql-stroke" x1="15" x2="9" y1="4" y2="4"></line>
								</svg>
							</span>
							<span tabindex="0" role="button" class="ql-picker-item" data-value="justify">
								<svg viewBox="0 0 18 18">
									<line class="ql-stroke" x1="15" x2="3" y1="9" y2="9"></line>
									<line class="ql-stroke" x1="15" x2="3" y1="14" y2="14"></line>
									<line class="ql-stroke" x1="15" x2="3" y1="4" y2="4"></line>
								</svg>
							</span>
						</span>
					</span>
					<select class="ql-align" style="display: none;">
						<option selected="selected"></option>
						<option value="center"></option>
						<option value="right"></option>
						<option value="justify"></option>
					</select>
				</span>

				<span class="ql-formats">
					<span class="ql-color ql-picker ql-color-picker">
						<span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-2">
							<svg viewBox="0 0 18 18">
								<line class="ql-color-label ql-stroke ql-transparent" x1="3" x2="15" y1="15" y2="15"></line>
								<polyline class="ql-stroke" points="5.5 11 9 3 12.5 11"></polyline>
								<line class="ql-stroke" x1="11.63" x2="6.38" y1="9" y2="9"></line>
							</svg>
						</span>
						<span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-2"><span tabindex="0" role="button" class="ql-picker-item ql-primary"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#e60000" style="background-color: rgb(230, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ff9900" style="background-color: rgb(255, 153, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ffff00" style="background-color: rgb(255, 255, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#008a00" style="background-color: rgb(0, 138, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#0066cc" style="background-color: rgb(0, 102, 204);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#9933ff" style="background-color: rgb(153, 51, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffff" style="background-color: rgb(255, 255, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#facccc" style="background-color: rgb(250, 204, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffebcc" style="background-color: rgb(255, 235, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffcc" style="background-color: rgb(255, 255, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#cce8cc" style="background-color: rgb(204, 232, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#cce0f5" style="background-color: rgb(204, 224, 245);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ebd6ff" style="background-color: rgb(235, 214, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#bbbbbb" style="background-color: rgb(187, 187, 187);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#f06666" style="background-color: rgb(240, 102, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffc266" style="background-color: rgb(255, 194, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffff66" style="background-color: rgb(255, 255, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#66b966" style="background-color: rgb(102, 185, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#66a3e0" style="background-color: rgb(102, 163, 224);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#c285ff" style="background-color: rgb(194, 133, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#888888" style="background-color: rgb(136, 136, 136);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#a10000" style="background-color: rgb(161, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#b26b00" style="background-color: rgb(178, 107, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#b2b200" style="background-color: rgb(178, 178, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#006100" style="background-color: rgb(0, 97, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#0047b2" style="background-color: rgb(0, 71, 178);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#6b24b2" style="background-color: rgb(107, 36, 178);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#444444" style="background-color: rgb(68, 68, 68);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#5c0000" style="background-color: rgb(92, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#663d00" style="background-color: rgb(102, 61, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#666600" style="background-color: rgb(102, 102, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#003700" style="background-color: rgb(0, 55, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#002966" style="background-color: rgb(0, 41, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#3d1466" style="background-color: rgb(61, 20, 102);"></span></span>
					</span>
					<select class="ql-color" style="display: none;">
						<option selected="selected"></option>
						<option value="#e60000"></option>
						<option value="#ff9900"></option>
						<option value="#ffff00"></option>
						<option value="#008a00"></option>
						<option value="#0066cc"></option>
						<option value="#9933ff"></option>
						<option value="#ffffff"></option>
						<option value="#facccc"></option>
						<option value="#ffebcc"></option>
						<option value="#ffffcc"></option>
						<option value="#cce8cc"></option>
						<option value="#cce0f5"></option>
						<option value="#ebd6ff"></option>
						<option value="#bbbbbb"></option>
						<option value="#f06666"></option>
						<option value="#ffc266"></option>
						<option value="#ffff66"></option>
						<option value="#66b966"></option>
						<option value="#66a3e0"></option>
						<option value="#c285ff"></option>
						<option value="#888888"></option>
						<option value="#a10000"></option>
						<option value="#b26b00"></option>
						<option value="#b2b200"></option>
						<option value="#006100"></option>
						<option value="#0047b2"></option>
						<option value="#6b24b2"></option>
						<option value="#444444"></option>
						<option value="#5c0000"></option>
						<option value="#663d00"></option>
						<option value="#666600"></option>
						<option value="#003700"></option>
						<option value="#002966"></option>
						<option value="#3d1466"></option>
					</select>
					<span class="ql-background ql-picker ql-color-picker">
						<span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-3">
							<svg viewBox="0 0 18 18">
								<g class="ql-fill ql-color-label">
									<polygon points="6 6.868 6 6 5 6 5 7 5.942 7 6 6.868"></polygon>
									<rect height="1" width="1" x="4" y="4"></rect>
									<polygon points="6.817 5 6 5 6 6 6.38 6 6.817 5"></polygon>
									<rect height="1" width="1" x="2" y="6"></rect>
									<rect height="1" width="1" x="3" y="5"></rect>
									<rect height="1" width="1" x="4" y="7"></rect>
									<polygon points="4 11.439 4 11 3 11 3 12 3.755 12 4 11.439"></polygon>
									<rect height="1" width="1" x="2" y="12"></rect>
									<rect height="1" width="1" x="2" y="9"></rect>
									<rect height="1" width="1" x="2" y="15"></rect>
									<polygon points="4.63 10 4 10 4 11 4.192 11 4.63 10"></polygon>
									<rect height="1" width="1" x="3" y="8"></rect>
									<path d="M10.832,4.2L11,4.582V4H10.708A1.948,1.948,0,0,1,10.832,4.2Z"></path>
									<path d="M7,4.582L7.168,4.2A1.929,1.929,0,0,1,7.292,4H7V4.582Z"></path>
									<path d="M8,13H7.683l-0.351.8a1.933,1.933,0,0,1-.124.2H8V13Z"></path>
									<rect height="1" width="1" x="12" y="2"></rect>
									<rect height="1" width="1" x="11" y="3"></rect>
									<path d="M9,3H8V3.282A1.985,1.985,0,0,1,9,3Z"></path>
									<rect height="1" width="1" x="2" y="3"></rect>
									<rect height="1" width="1" x="6" y="2"></rect>
									<rect height="1" width="1" x="3" y="2"></rect>
									<rect height="1" width="1" x="5" y="3"></rect>
									<rect height="1" width="1" x="9" y="2"></rect>
									<rect height="1" width="1" x="15" y="14"></rect>
									<polygon points="13.447 10.174 13.469 10.225 13.472 10.232 13.808 11 14 11 14 10 13.37 10 13.447 10.174"></polygon>
									<rect height="1" width="1" x="13" y="7"></rect>
									<rect height="1" width="1" x="15" y="5"></rect>
									<rect height="1" width="1" x="14" y="6"></rect>
									<rect height="1" width="1" x="15" y="8"></rect>
									<rect height="1" width="1" x="14" y="9"></rect>
									<path d="M3.775,14H3v1H4V14.314A1.97,1.97,0,0,1,3.775,14Z"></path>
									<rect height="1" width="1" x="14" y="3"></rect>
									<polygon points="12 6.868 12 6 11.62 6 12 6.868"></polygon>
									<rect height="1" width="1" x="15" y="2"></rect>
									<rect height="1" width="1" x="12" y="5"></rect>
									<rect height="1" width="1" x="13" y="4"></rect>
									<polygon points="12.933 9 13 9 13 8 12.495 8 12.933 9"></polygon>
									<rect height="1" width="1" x="9" y="14"></rect>
									<rect height="1" width="1" x="8" y="15"></rect>
									<path d="M6,14.926V15H7V14.316A1.993,1.993,0,0,1,6,14.926Z"></path>
									<rect height="1" width="1" x="5" y="15"></rect>
									<path d="M10.668,13.8L10.317,13H10v1h0.792A1.947,1.947,0,0,1,10.668,13.8Z"></path>
									<rect height="1" width="1" x="11" y="15"></rect>
									<path d="M14.332,12.2a1.99,1.99,0,0,1,.166.8H15V12H14.245Z"></path>
									<rect height="1" width="1" x="14" y="15"></rect>
									<rect height="1" width="1" x="15" y="11"></rect>
								</g>
								<polyline class="ql-stroke" points="5.5 13 9 5 12.5 13"></polyline>
								<line class="ql-stroke" x1="11.63" x2="6.38" y1="11" y2="11"></line>
							</svg>
						</span>
						<span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-3"><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#000000" style="background-color: rgb(0, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#e60000" style="background-color: rgb(230, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ff9900" style="background-color: rgb(255, 153, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#ffff00" style="background-color: rgb(255, 255, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#008a00" style="background-color: rgb(0, 138, 0);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#0066cc" style="background-color: rgb(0, 102, 204);"></span><span tabindex="0" role="button" class="ql-picker-item ql-primary" data-value="#9933ff" style="background-color: rgb(153, 51, 255);"></span><span tabindex="0" role="button" class="ql-picker-item"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#facccc" style="background-color: rgb(250, 204, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffebcc" style="background-color: rgb(255, 235, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffffcc" style="background-color: rgb(255, 255, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#cce8cc" style="background-color: rgb(204, 232, 204);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#cce0f5" style="background-color: rgb(204, 224, 245);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ebd6ff" style="background-color: rgb(235, 214, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#bbbbbb" style="background-color: rgb(187, 187, 187);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#f06666" style="background-color: rgb(240, 102, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffc266" style="background-color: rgb(255, 194, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#ffff66" style="background-color: rgb(255, 255, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#66b966" style="background-color: rgb(102, 185, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#66a3e0" style="background-color: rgb(102, 163, 224);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#c285ff" style="background-color: rgb(194, 133, 255);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#888888" style="background-color: rgb(136, 136, 136);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#a10000" style="background-color: rgb(161, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#b26b00" style="background-color: rgb(178, 107, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#b2b200" style="background-color: rgb(178, 178, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#006100" style="background-color: rgb(0, 97, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#0047b2" style="background-color: rgb(0, 71, 178);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#6b24b2" style="background-color: rgb(107, 36, 178);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#444444" style="background-color: rgb(68, 68, 68);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#5c0000" style="background-color: rgb(92, 0, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#663d00" style="background-color: rgb(102, 61, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#666600" style="background-color: rgb(102, 102, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#003700" style="background-color: rgb(0, 55, 0);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#002966" style="background-color: rgb(0, 41, 102);"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="#3d1466" style="background-color: rgb(61, 20, 102);"></span></span>
					</span>
					<select class="ql-background" style="display: none;">
						<option value="#000000"></option>
						<option value="#e60000"></option>
						<option value="#ff9900"></option>
						<option value="#ffff00"></option>
						<option value="#008a00"></option>
						<option value="#0066cc"></option>
						<option value="#9933ff"></option>
						<option selected="selected"></option>
						<option value="#facccc"></option>
						<option value="#ffebcc"></option>
						<option value="#ffffcc"></option>
						<option value="#cce8cc"></option>
						<option value="#cce0f5"></option>
						<option value="#ebd6ff"></option>
						<option value="#bbbbbb"></option>
						<option value="#f06666"></option>
						<option value="#ffc266"></option>
						<option value="#ffff66"></option>
						<option value="#66b966"></option>
						<option value="#66a3e0"></option>
						<option value="#c285ff"></option>
						<option value="#888888"></option>
						<option value="#a10000"></option>
						<option value="#b26b00"></option>
						<option value="#b2b200"></option>
						<option value="#006100"></option>
						<option value="#0047b2"></option>
						<option value="#6b24b2"></option>
						<option value="#444444"></option>
						<option value="#5c0000"></option>
						<option value="#663d00"></option>
						<option value="#666600"></option>
						<option value="#003700"></option>
						<option value="#002966"></option>
						<option value="#3d1466"></option>
					</select>
				</span>
			
			</div>
			<div class="theProposalEditor">
				
				<h1>This is a sample header</h1>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo ipsa numquam et consectetur corporis facilis veritatis commodi iusto, obcaecati officiis aspernatur voluptate error eum nostrum minima! Minus in voluptates, eum facilis quis facere numquam assumenda repudiandae. Laudantium fuga adipisci, est aliquid neque voluptas assumenda modi quisquam quae, praesentium odio doloremque ab. Dolores ipsum ipsam earum omnis inventore nisi tempora soluta temporibus esse accusantium, ea delectus, minima officiis vel repellat placeat, eos aliquid! Dolore placeat dolorem nihil quae cum magnam, autem laboriosam ex incidunt doloribus deleniti sapiente ratione. Fugiat aspernatur, commodi aperiam facilis odit, eius pariatur rerum inventore, repudiandae, eveniet ipsam? Debitis omnis aliquid fugiat eum quae rem ex provident animi, quidem id voluptatum corporis ipsum obcaecati nemo doloribus consequuntur perferendis sint? Blanditiis neque fuga, sint amet architecto nostrum quas. Doloribus quas fugiat perferendis. Ipsa natus, deserunt! Exercitationem suscipit iusto, sequi? Illum totam temporibus perspiciatis ab, reprehenderit iure aut eligendi repellat maiores sunt vitae quam assumenda dolores, a deserunt. Minima quam ipsum non, tempora, vel aperiam id. Quam dolores maiores, id nobis aspernatur odio, excepturi inventore, itaque vitae at vero placeat? Ullam commodi distinctio minus vitae neque, quibusdam iste sint, odio dicta quidem recusandae animi perspiciatis expedita, ex consequuntur dolore dignissimos repellendus iusto voluptatum repudiandae illo quam. Illo commodi ipsa maiores quo modi, possimus magni iste esse! Nostrum sed magnam aliquam recusandae dolore odio libero iure, est minus explicabo! Qui nisi expedita velit, sunt deleniti adipisci perferendis! Voluptatum explicabo unde, nisi asperiores? Numquam doloremque laboriosam amet perspiciatis nostrum deleniti molestias minima vel dolores fugit, id animi cum accusamus mollitia sit maiores delectus omnis, quia quod earum, suscipit repudiandae aliquid! At officia enim nulla recusandae eius, eum debitis consequuntur blanditiis, ea ullam autem numquam nihil commodi minus tempora tenetur distinctio illo sunt adipisci. Dolorum eum minima cupiditate accusamus recusandae, aliquid magnam quas asperiores autem vitae harum ducimus vero nesciunt optio quaerat aliquam sequi! Reiciendis, animi laudantium libero. Sint vero quibusdam ducimus tenetur, ab molestiae, laboriosam aperiam nobis? Beatae ab consequatur similique, ratione unde nostrum. Neque odio iste excepturi esse facilis reiciendis. Quam sequi facere at repellat optio!</p>

			</div>
		</div>

	</div>

</div>

<!-- More Bleh -->
<script src="/app/includes/js/page.proposal.js"></script>