@props(["visible" => true])

<td style="{{!$visible ? 'display:none' : ''}}">
    {{$slot}}
</td>