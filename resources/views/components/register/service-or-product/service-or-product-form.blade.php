<div class="row">
    <div class="col-md-3">
        <select-field name="selectType" [options]="types" [(ngModel)]="defaultType"></select-field>
    </div>
</div>
<separator></separator>
<product-form [underModal]="true" (inserted)="insertProduct($event)" (cameback)="onCameback()" *ngIf="defaultType == 'product'"></product-form>
<service-form [underModal]="true" (inserted)="insertService($event)" (cameback)="onCameback()" *ngIf="defaultType == 'service'"></service-form>
