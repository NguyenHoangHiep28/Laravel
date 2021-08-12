$(document).ready(function () {
    const btn = $('.edit-btn');
    var length = 0;
    btn.click(function () {
        const current_btn = $(this);
        const id = $(this).attr("itemid");

        const input = $("td#" + id).find("input:text");
        const saveBtn = $("td#" + id).find("button.save-btn");
        saveBtn.css("display", "inline-block");
        input.prop('disabled', false);
        input.focus();
        var tmpStr = input.val();
        input.val('');
        input.val(tmpStr);
        if (current_btn.html() !== "Cancel") {
            current_btn.html('Cancel');
            //get before edited length
            length = tmpStr.length;
        }else {
            current_btn.html('<i class="fas fa-edit"></i> Edit');
            input.prop('disabled', true);
            saveBtn.css("display", "none");
            //get entered characters number when editing
            var sub = tmpStr.length - length;
            //remove those characters if not continue editing
            tmpStr = tmpStr.substr(0, tmpStr.length-sub);
            input.val(tmpStr);
        }
    });
});
