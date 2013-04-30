function openDialog(ludingTitle) {
    var dlg = $("#mydialog"),
            url, ifr;

    if (typeof ludingTitle === "string" && ludingTitle.length > 0) {
        url = "http://sunsite.informatik.rwth-aachen.de/cgi-bin/luding/GameName.py?lang=DE&frames=0&gamename=" + escape(ludingTitle);
        ifr = $("<iframe />").attr("src", url).attr("width", "98%").attr("height", "100%");
        dlg.html("").append(ifr).dialog("open");
    }

    return false;
};
