<input type="hidden" id="accept-input"/>
<input type="hidden" id="decline-input"/>
<div class="k-dialog-wrapper" *ngIf="visible">
    <div class="k-overlay ng-trigger ng-trigger-overlayAppear"></div>
    <div class="k-widget k-window k-dialog ng-trigger ng-trigger-dialogSlideInAppear">
        <div class="k-window-titlebar k-dialog-titlebar k-header">
            <div class="k-window-title k-dialog-title">
                {{title}}
            </div>
            <div class="k-window-actions k-dialog-actions">
                <a aria-label="Fechar" class="k-button k-bare k-button-icon k-window-action k-dialog-action k-dialog-close" (click)="onClose()">
                    <span class="k-icon k-i-x"></span>
                </a>
            </div>
        </div>
        <div class="k-content k-window-content k-dialog-content">
            <div [innerHTML]="msg"></div>
        </div>
        <div class="k-button-group k-dialog-buttongroup k-dialog-button-layout-stretched">
            <!--
            <button class="k-button k-primary">Yes</button>
            <button class="k-button" dir="ltr">No</button>-->
            <button class="btn btn-primary" (click)="onAccept()"><i class="fa fa-check"></i><span>{{yesLabel}}</span></button>
            <button class="btn" icon="fa-close" (click)="onDecline()"><i class="fa fa-close"></i><span>{{noLabel}}</span></button>
        </div>
    </div>
</div>