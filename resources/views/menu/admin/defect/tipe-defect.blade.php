@if ($holoMiss > 0 || $holoScratch > 0 || $holoReg > 0)
  <span class="badge badge-pill badge-danger">Hologram</span> |
@endif
@if ($printBlurTxt > 0 || $printBlurImg > 0)
<span class="badge badge-pill badge-danger">Blur</span> |
@endif
@if ($printSmear > 0 || $printSpot > 0 )
<span class="badge badge-pill badge-danger">Blobor/Noda</span> |
@endif
@if ($printUnder > 0 || $printOver > 0 || $colorUnderImg > 0 || $colorOverImg > 0 || $colorUnderTxt > 0 || $colorOverTxt > 0)
<span class="badge badge-pill badge-danger">Tebal/Tipis</span> |
@endif
@if ($colorIncorrect > 0 || $colorNonUniform > 0)
<span class="badge badge-pill badge-danger">Salah Spec</span> |
@endif
@if ($appearanceFolded > 0 || $appearancePlooi > 0)
<span class="badge badge-pill badge-danger">Flui/Terlipat</span> |
@endif
@if ($appearanceHole > 0 || $appearanceTear > 0)
<span class="badge badge-pill badge-danger">Bolong/Sobek</span> |
@endif
@if ($mixedProduct > 0)
<span class="badge badge-pill badge-danger">Tercampur</span> |
@endif