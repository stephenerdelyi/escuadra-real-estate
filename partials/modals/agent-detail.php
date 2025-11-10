<?php
    global $the_theme;
?>
<div class="modal-agent-detail js-agent-detail-modal --loading" data-modal-name="agent-detail">
    <div class="modal-agent-detail__container js-agent-detail-modal-scroller">
        <div class="modal-agent-detail__main">
            <div class="modal-agent-detail__intro-container">
                <p class="modal-agent-detail__name js-agent-detail-modal-name"></p>
                <div class="modal-agent-detail__accounts js-agent-detail-modal-accounts"></div>
            </div>
            <ul class="modal-agent-detail__contact-container">
                <li class="modal-agent-detail__contact-option --email"><a class="modal-agent-detail__contact-option__link js-agent-detail-modal-email" href="#"></a></li>
                <li class="modal-agent-detail__contact-option --phone"><a class="modal-agent-detail__contact-option__link js-agent-detail-modal-phone" href="#"></a></li>
            </ul>
            <div class="modal-agent-detail__bio js-agent-detail-modal-bio"></div>
            <div class="modal-agent-detail__footnotes">
                <p class="modal-agent-detail__footnote"><span class="modal-agent-detail__footnote__title">Agent License:</span> <span class="js-agent-detail-modal-license"></span></p>
                <p class="modal-agent-detail__footnote"><span class="modal-agent-detail__footnote__title">Service Areas:</span> <span class="js-agent-detail-modal-areas"></span></p>
                <p class="modal-agent-detail__footnote"><span class="modal-agent-detail__footnote__title">Specialties:</span> <span class="js-agent-detail-modal-specialties"></span></p>
            </div>
        </div>
    </div>
</div>
