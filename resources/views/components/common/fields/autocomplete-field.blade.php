<label *ngIf="label" class="col-md-3 control-label">{{label}}</label>
<div class="input" [class.col-md-5]="label">
    <div class="autocomplete">
        <p-autoComplete name="{{name}}" field="{{name}}" [(ngModel)]="value" [suggestions]="options" [dropdown]="true" (completeMethod)="onSearch($event)"></p-autoComplete>
    </div>
</div>