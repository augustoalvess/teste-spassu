<label *ngIf="label" class="col-md-3 control-label">{{label}}</label>
<div class="input" [class.col-md-1]="label || grouped">
    <input name="{{name}}" type="radio" class="minimal radio-field" value="{{_value}}" [(ngModel)]="value" checked="{{checked}}" [required]="required" [disabled]="disabled" (click)="onChanged($event)">
    <span class="helper">{{helper}}</span>
</div>

