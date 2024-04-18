ej.base.enableRipple(true);
   //Sidebar initialization
   var defaultSidebar = new ej.navigations.Sidebar({
        type: "Auto",
        width: "290px",
        mediaQuery: '(min-width: 600px)',
        isOpen: true,
        // dockSize: '100px',
        // enableDock: true,
        target: document.querySelector('.maincontent')
    });
    defaultSidebar.appendTo('#default-sidebar');
    //end of sidebar initialization

    //toggle button initialization
    var togglebtn = new ej.buttons.Button({iconCss: 'e-icons burg-icon', isToggle: true, content:''}, '#toggle');

    //Click Event.
    document.getElementById('toggle').onclick = function(){
        if (document.getElementById('toggle').classList.contains('e-active')) {
            defaultSidebar.show();
        } else {
            defaultSidebar.hide();
        }
    };

