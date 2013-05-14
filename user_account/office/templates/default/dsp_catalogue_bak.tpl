
<script type="text/javascript">
function load_ajax(id){
	alert(id);
}
</script>
<section id="content">
    <ul class="list-items">
        [@list_products]
    </ul>
</section>


<div class="popup-item popup hidden">
    <a href="#" title="Close" class="btn-close close-popup">X</a>
    <div class="info-item">
        <div class="image-item"></div>
        <div class="context-item">
            <h4>"Freshly Brewed" [AD] - 3mm Sintra</h4>
            <div class="fckDefault">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
            </div>
        </div>
    </div>
    <div class="tabs-item">
        <ul>
            <li>Image</li>
            <li>Size</li>
            <li>Material</li>
            <li>Text</li>
        </ul>
        <div class="tab-image">
            <div class="nofication" style="display:none">There is no option avaiable for this item</div>
            <form id="upload-image" method="post" action="upload.php">
                <ul>
                    <li>
                        <label for="image-file">Please upload your image: </label>
                        <input type="file" name="image-file" id="image-file" onchange="fileSelected();"/>
                    </li>
                    <li>
                        <input type="button" value="Upload" onclick="startUploading();" class="btn"/>
                        <input type="button" value="Use Default" onclick="defaultImage();" class="btn"/>
                    </li>
                    <li>
                        <div id="progress_info">
                            <div id="progress"></div>
                            <div id="progress_percent">&nbsp;</div>
                            <div class="clear_both"></div>
                            <div>
                                <div id="speed">&nbsp;</div>
                                <div id="remaining">&nbsp;</div>
                                <div id="b_transfered">&nbsp;</div>
                                <div class="clear_both"></div>
                            </div>
                            <div id="upload_response"></div>
                        </div>
                    </li>
                    <li>
                        <div id="error">You should select valid image files only!</div>
                        <div id="error2">An error occurred while uploading the file</div>
                        <div id="abort">The upload has been canceled by the user or the browser dropped the connection</div>
                        <div id="warnsize">Your file is very big. We can't accept it. Please select small file</div>
                    </li>
                </ul>
            </form>
            <img id="preview-image" class="preview-image" src="images/visu-item.jpg"/>
        </div>
        <div class="tab-size">
            <div class="select-ganeral">
                <span>Please select size for item: </span>
                <label>
                    <select>
                        <option selected="">Select...</option>
                        <option>18"x20"</option>
                        <option>36"x40"</option>
                        <option>10"x10"</option>
                        <option>Custom</option>
                    </select>
                </label>
            </div>
            <div class="custom-size">
                <fieldset>
                    <legend>Custom Size</legend>
                    <div><label for="custom-width">Width:</label> <input type="text" id="custom-width" name="width" ><span>(inch)</span></div>
                    <div><label for="custom-height">Height:</label> <input type="text" id="custom-height" name="height"><span>(inch)</span></div>
                </fieldset>
            </div>
        </div>
        <div class="tab-material">
            <div class="select-ganeral">
                <span>Please select Meterial for item: </span>
                <label>
                    <select>
                        <option selected="">Select...</option>
                        <option>Sintra</option>
                        <option>Coroplast</option>
                        <option>Custom</option>
                    </select>
                </label>
            </div>
            <div class="select-ganeral">
                <span>Please select Thichness for item: </span>
                <label>
                    <select>
                        <option selected="">Select...</option>
                        <option>3mm</option>
                        <option>6mm</option>
                        <option>4,5mm</option>
                    </select>
                </label>
            </div>
            <div class="select-ganeral">
                <span>Please select Colour for item: </span>
                <label>
                    <select>
                        <option selected="">Select...</option>
                        <option>red</option>
                        <option>white</option>
                        <option>blue</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="tab-text">
            <div>Please fill text you want to change</div>
            <ul>
                <li><label for="field-1">Field 1: </label><input id="field-1" type="text" class=""></li>
                <li><label for="field-2">Field 2: </label><input id="field-2" type="text" class=""></li>
                <li><label for="field-3">Field 3: </label><input id="field-3" type="text" class=""></li>
                <li><label for="field-4">Field 4: </label><input id="field-4" type="text" class=""></li>
            </ul>
        </div>
    </div>
    <div class="module-item">
        <div class="wrap-quantity"><span>Quantity: </span><a href="javascript:void(0)" title="reduced" class="btn"><</a><input type="text" name="value quantity" value="1" class=""><a href="javascript:void(0)" title="inscrease" class="btn">></a></div>
        <div>Unit Price: <span class="price">18$</span></div>
        <div>Extended Price: <span class="price-ex"></span></div>
    </div>
    <div class="wrap-button">
        <input type="button" value="Add to Order" class="btn btn-primary" />
    </div>
</div>