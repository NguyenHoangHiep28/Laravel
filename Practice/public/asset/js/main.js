$(document).ready(function () {
    const btn = $('.edit-btn');
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
            input.val(tmpStr);
        }else {
            current_btn.html('<i class="fas fa-edit"></i> Edit');
            input.prop('disabled', true);
            saveBtn.css("display", "none");
        }
    });
});
