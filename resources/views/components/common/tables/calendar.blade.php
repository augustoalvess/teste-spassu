<p-calendar [(ngModel)]="date" [inline]="true" [locale]="locale" (onSelect)="onSelect($event)" (onMonthChange)="onMonthChange($event)"></p-calendar>