<a class="nav-link dropdown-toggle arrow-none waves-effect" [class.showPress]="show" (click)="showNotices()">
    <i class="mdi mdi-bell-outline noti-icon"></i>
    <span *ngIf="value.length > 0 && !show" class="badge badge-danger noti-icon-badge" style="padding: .25em .4em;">{{value.length}}</span>
</a>
<div *ngIf="show" class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg notice-dropdown">
    <a *ngFor="let notice of value; let i = index;" href="javascript:void(0);" class="dropdown-item notify-item">
        <div>
            <i class="fa fa-exclamation-circle fa-fw"></i> {{notice['title']}} <br>
            <span class="text-muted small notice-{{notice['type']}}" ></span>
            <p class="notify-details"><small class="text-muted" [innerHTML]="notice['msg']"></small></p>
        </div>
    </a>
    <a *ngIf="value.length == 0" href="javascript:void(0);" class="dropdown-item notify-item">
        <div><p class="notify-details"><small class="text-muted">Você não têm novas notificações.</small></p></div>
    </a>
</div>