<div class="box box-solid">
    <div class="box-header with-border" *ngIf="title">
        <h3 class="box-title">{{title}}</h3>
    </div>
    <div class="box-body">
        <ng-content></ng-content>
    </div>
</div>