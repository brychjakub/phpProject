<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Rezervace CMcZŠ</title>
    <link rel="stylesheet" href="/static/aui/css/aui.css" media="all"/>
    <script type="text/javascript" src="/static/jquery/jquery-min.js"></script>
    <script type="text/javascript" src="/static/aui/js/aui.js"></script>
    <script type="text/javascript" src="/static/aui/js/aui-soy.js"></script>
    <script type="text/javascript" src="/static/aui/js/aui-experimental.js"></script>
    <script type="text/javascript" src="/static/aui/js/aui-datepicker.js"></script>
    <script type="text/javascript">
        AJS.contextPath = function() {
            return '';
        }
        AJS.$(document).ready(function() {
        });
    </script>
</head>
<body class="aui-layout aui-theme-default" id="page">
    <div id="page">
        <header id="header" role="banner">
            <!-- App Header goes inside #header -->
            <nav class="aui-header aui-dropdown2-trigger-group" role="navigation">
                <div class="aui-header-primary">
                    <h4 id="logo" class="aui-header-logo aui-header-logo-textonly">
                        <img src="/static/cust/cmzs/img/01.png" style="padding-right: 20px"/>
                        <span class="aui-header-logo-device" style="color: #f2f2f2">Cyrilometodějská církevní základní škola Brno</span>
                    </h4>
                </div>
                <div class="aui-header-secondary">
                    <ul class="aui-nav">
                        <li><h1 style="color: #f2f2f2">Rezervační systém</h1></li>
                        <li>
                            <a href="#dropdown2-header9" aria-owns="dropdown2-header9" aria-haspopup="true" class="aui-dropdown2-trigger" aria-controls="dropdown2-header9">
                                <div class="aui-avatar aui-avatar-small">
                                    <div class="aui-avatar-inner">
                                        <img src="/static/img/user-avatar-16.png"/>
                                    </div>
                                </div>
                            </a>
                            <div class="aui-dropdown2 aui-style-default aui-dropdown2-in-header" id="dropdown2-header9" style="display: none; top: 40px; min-width: 160px; left: 1213px;" aria-hidden="true">
                                <div class="aui-dropdown2-section">
                                    <ul>
                                        <li><a href="/logout">Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- App Header goes inside #header -->
        </header>
        <div id="page">
            <section id="content" role="main">
                <div class="aui-page-panel">
                    <div class="aui-page-panel-inner">
                        <section class="aui-page-panel-content">
                            <h2>Vytvoř novou událost</h2>
                            <form action="/admin/event/createupdate/do.php" method="post" id="event-create-form-id" class="aui">
                                <input type="hidden" name="id" id="eventId" value="">
                                <fieldset>
                                    <div class="field-group">
                                        <label for="eventName">Jméno události<span class="aui-icon icon-required">required</span></label>
                                        <input class="text" type="text" id="eventName" name="eventName" value="">
                                        <div class="description">Např. 'Zápis do 1.B', 'Třídní schůzky 6. června 2016', atd.</div>
                                    </div>
                                    <div class="field-group">
                                        <label for="startDate">Datum začátku<span class="aui-icon icon-required">required</span></label>
                                        <input class="text medium-field" type="date" id="startDate" name="startDate" value="">
                                        <div class="description">Začátek nesmí být v minulosti. Datum je ve formátu mm/dd/rrrr (např. 12/21/2012).</div>
                                    </div>
                                    <div class="field-group">
                                        <label for="startTime">Čas začátku<span class="aui-icon icon-required">required</span></label>
                                        <input class="text medium-field" type="text" id="startTime" name="startTime" value="">
                                    </div>
                                    <div class="field-group">
                                        <label for="endDate">Datum konce<span class="aui-icon icon-required">required</span></label>
                                        <input class="text medium-field" type="date" id="endDate" name="endDate" value="">
                                        <div class="description">Datum konce. Datum je ve formátu mm/dd/rrrr (např. 12/21/2012)</div>
                                    </div>
                                    <div class="field-group">
                                        <label for="endTime">Čas konce<span class="aui-icon icon-required">required</span></label>
                                        <input class="text medium-field" type="text" id="endTime" name="endTime" value="">
                                    </div>
                                    <div class="field-group">
                                        <label for="bookingPeriod">Interval<span class="aui-icon icon-required">required</span></label>
                                        <input class="text medium-field" type="text" id="bookingPeriod" name="bookingPeriod" title="Perioda" value="">
                                        <div class="description">Interval (v minutách) určující frekvenci rezervačních oken</div>
                                    </div>
                                    <fieldset class="group">
                                        <legend><span>Otevřeno</span></legend>
                                        <div class="checkbox">
                                            <input class="checkbox" type="checkbox" name="eventOpen" id="eventOpen">
                                            <label for="eventOpen">&nbsp;</label>
                                        </div>
                                        <div class="description">Uzavřené události se nezobrazují uživatelům a nepovolují vytvářet další rezervace</div>
                                    </fieldset>
                                </fieldset>
                                <div class="buttons-container">
                                    <div class="buttons">
                                        <input class="button submit" type="submit" value="Uložit" id="id-save-btn1">
                                        <a class="cancel" href="/admin/event/list"> Zrušit</a>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </section>
        </div>
        <footer role="contentinfo" id="footer">
            <section class="footer-body" style="background: none">
                <ul class="atlassian-footer" style="margin-top:30px; margin-bottom: 10px ">
                    <li>v. MVP_1.1, 14-04-2018--10-28</li>
                </ul>
            </section>
        </footer>
    </div>
</body>
</html>
