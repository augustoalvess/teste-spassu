<label *ngIf="label" class="col-md-3 control-label">{{label}}</label>
<div class="input" [class.col-md-3]="label">
    <input name="{{name}}" type="time" placeholder="{{placeholder}}" class="{{class}}" [(ngModel)]="value" (blur)="onTouched($event)" (focus)="onFocus($event)" (keyup)="onKeyUp($event)" [required]="required" [disabled]="disabled" [autofocus]="autofocus">
</div>