if (typeof hlAPan === 'undefined') hlAPan = {};
if (typeof hlAPan.actions === 'undefined') hlAPan.actions = {
    register: function () {
        const th = this;
        var intervalId = setInterval(function () {
            if (document.body !== null) {
                clearInterval(intervalId);
                th.stateOnload();
            }
        }, 20);
    },
    stateOnload: function () {
        var th = this;
        document.querySelectorAll('.hl-pan-menu-switch, .hl-pan-menu-arrow, #hl-pan-background').forEach(
            function (b) {
                b.addEventListener('click', function() {
                    var menu = document.getElementById('hl-pan-menu');
                    var win = document.getElementById('hl-pan-over');
                    var cnt = document.getElementById('hl-pan-content');
                    var over = document.getElementById('hl-pan-over-content');
                    var bg = document.getElementById('hl-pan-background');
                    if (menu) {
                        if (menu.classList.contains('hl-pan-cell-default')) {
                            menu.classList.remove('hl-pan-cell-default');
                            if (menu.offsetWidth > 30) {
                                menu.style.display = 'none';
                                bg.style.display = 'none'
                                win.classList.remove('hl-pan-blocked-window');
                                win.classList.add('hl-pan-full');
                                over.classList.add('hl-pan-over-full');
                                cnt.classList.add('hl-content-full');
                            } else {
                                menu.style.display = 'block';
                                bg.style.display = 'block';
                                win.classList.add('hl-pan-blocked-window');
                                win.classList.remove('hl-pan-full');
                                over.classList.remove('hl-pan-over-full');
                                cnt.classList.remove('hl-content-full');
                            }
                        } else if (menu.style.display === 'none') {
                            menu.style.display = 'block';
                            bg.style.display = 'block';
                            win.classList.add('hl-pan-blocked-window');
                            win.classList.add('hl-pan-full');
                            over.classList.remove('hl-pan-over-full');
                            cnt.classList.remove('hl-content-full');
                        } else {
                            menu.style.display = 'none';
                            bg.style.display = 'none';
                            win.classList.remove('hl-pan-blocked-window');
                            win.classList.remove('hl-pan-full');
                            over.classList.add('hl-pan-over-full');
                            cnt.classList.add('hl-content-full');
                        }
                    }
                }, true);
            }
        );

        document.querySelectorAll('.hl-pan-menu-section-btn').forEach(
            function (b) {
                b.addEventListener('click', function() {
                    var a = b.parentNode.querySelectorAll('.hl-pan-menu-attachment');
                    if (a && a.length) {
                        a[0].classList.toggle('hl-pan-block-visible');
                    }
                    var c = b.querySelectorAll('.hl-pan-menu-open-symbol');
                    if (c && c.length) {
                        c[0].classList.toggle('hl-pan-rotate-90-return');
                    }
                });
            }
        );

        document.querySelectorAll('.hl-pan-menu-row').forEach(
            function (b) {
                b.addEventListener('click', function () {
                    var a = b.querySelector('a');
                    if (a) {
                        a.click();
                    }
                });
            }
        );

        document.querySelectorAll('.hl-pan-menu-trans-select').forEach(
            function (b) {
                b.addEventListener('change', function () {
                    window.location.href = b.value;
                });
            }
        );

        this.scrollToSelectedMenuBlock();
    },
    scrollToSelectedMenuBlock: function () {
        var menu = document.querySelector('.hl-pan-menu-list');
        var block = document.querySelector('.hl-pan-current-url');
        if (menu && block) {
            var blockPos= block.offsetTop;
            if (blockPos > menu.clientHeight - 30) {
                menu.scrollTo(0,blockPos + 30);
            }
        }
    }
}

hlAPan.actions.register();
