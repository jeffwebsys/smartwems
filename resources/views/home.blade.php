@extends('layouts.app')

@section('content')
@section('title','Dashboard')
<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-one">
        <div class="widget-heading">
            <h6 class="">Ticket Trends</h6>
        </div>
        <div class="w-chart">
            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Tickets Created</p>
                    <p class="w-stats">{{ $ticket->count() }}</p>
                </div>
                <div class="w-chart-render-one" style="position: relative;">
                    <div id="total-users" style="min-height: 80px;"><div id="apexchartsge9n1ehsi" class="apexcharts-canvas apexchartsge9n1ehsi light" style="width: 175px; height: 80px;"><svg id="SvgjsSvg1001" width="175" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(40, 35)"><defs id="SvgjsDefs1002"><clipPath id="gridRectMaskge9n1ehsi"><rect id="SvgjsRect1007" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskge9n1ehsi"><rect id="SvgjsRect1008" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><filter id="SvgjsFilter1016" filterUnits="userSpaceOnUse"><feFlood id="SvgjsFeFlood1017" flood-color="#e2a03f" flood-opacity="0.7" result="SvgjsFeFlood1017Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1018" in="SvgjsFeFlood1017Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1018Out"></feComposite><feOffset id="SvgjsFeOffset1019" dx="1" dy="1" result="SvgjsFeOffset1019Out" in="SvgjsFeComposite1018Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1020" stdDeviation="2 " result="SvgjsFeGaussianBlur1020Out" in="SvgjsFeOffset1019Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1021" result="SvgjsFeMerge1021Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1022" in="SvgjsFeGaussianBlur1020Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1023" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1024" in="SourceGraphic" in2="SvgjsFeMerge1021Out" mode="normal" result="SvgjsFeBlend1024Out"></feBlend></filter></defs><line id="SvgjsLine1006" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1026" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1029" class="apexcharts-grid"><line id="SvgjsLine1031" x1="0" y1="45" x2="135" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1030" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1010" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1011" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-line-0" d="M0 31.5C5.25 31.5 9.75 39.214285714285715 15 39.214285714285715C20.25 39.214285714285715 24.75 21.857142857142858 30 21.857142857142858C35.25 21.857142857142858 39.75 37.285714285714285 45 37.285714285714285C50.25 37.285714285714285 54.75 16.714285714285715 60 16.714285714285715C65.25 16.714285714285715 69.75 28.92857142857143 75 28.92857142857143C80.25 28.92857142857143 84.75 7.071428571428569 90 7.071428571428569C95.25 7.071428571428569 99.75 18.642857142857142 105 18.642857142857142C110.25 18.642857142857142 114.75 2.5714285714285694 120 2.5714285714285694C125.25 2.5714285714285694 129.75 28.92857142857143 135 28.92857142857143C135 28.92857142857143 135 28.92857142857143 135 28.92857142857143 " fill="none" fill-opacity="1" stroke="rgba(226,160,63,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskge9n1ehsi)" filter="url(#SvgjsFilter1016)" pathTo="M 0 31.5C 5.25 31.5 9.75 39.214285714285715 15 39.214285714285715C 20.25 39.214285714285715 24.75 21.857142857142858 30 21.857142857142858C 35.25 21.857142857142858 39.75 37.285714285714285 45 37.285714285714285C 50.25 37.285714285714285 54.75 16.714285714285715 60 16.714285714285715C 65.25 16.714285714285715 69.75 28.92857142857143 75 28.92857142857143C 80.25 28.92857142857143 84.75 7.071428571428569 90 7.071428571428569C 95.25 7.071428571428569 99.75 18.642857142857142 105 18.642857142857142C 110.25 18.642857142857142 114.75 2.5714285714285694 120 2.5714285714285694C 125.25 2.5714285714285694 129.75 28.92857142857143 135 28.92857142857143" pathFrom="M -1 45L -1 45L 15 45L 30 45L 45 45L 60 45L 75 45L 90 45L 105 45L 120 45L 135 45"></path><g id="SvgjsG1012" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1037" r="0" cx="0" cy="0" class="apexcharts-marker w14zz0vgm no-pointer-events" stroke="#ffffff" fill="#e2a03f" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1013" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1032" x1="0" y1="0" x2="135" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1033" x1="0" y1="0" x2="135" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1034" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1035" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1036" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1005" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1027" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1028" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(226, 160, 63);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 176px; height: 81px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>


            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Completed Tickets</p>
                    <p class="w-stats">{{ $ticketCompleted->count() }}</p>
                </div>
                <div class="w-chart-render-one" style="position: relative;">
                    <div id="paid-visits" style="min-height: 80px;"><div id="apexchartstdbqc67v" class="apexcharts-canvas apexchartstdbqc67v light" style="width: 175px; height: 80px;"><svg id="SvgjsSvg1038" width="175" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1040" class="apexcharts-inner apexcharts-graphical" transform="translate(40, 35)"><defs id="SvgjsDefs1039"><clipPath id="gridRectMasktdbqc67v"><rect id="SvgjsRect1044" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMasktdbqc67v"><rect id="SvgjsRect1045" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><filter id="SvgjsFilter1053" filterUnits="userSpaceOnUse"><feFlood id="SvgjsFeFlood1054" flood-color="#009688" flood-opacity="0.7" result="SvgjsFeFlood1054Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1055" in="SvgjsFeFlood1054Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1055Out"></feComposite><feOffset id="SvgjsFeOffset1056" dx="1" dy="3" result="SvgjsFeOffset1056Out" in="SvgjsFeComposite1055Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1057" stdDeviation="3 " result="SvgjsFeGaussianBlur1057Out" in="SvgjsFeOffset1056Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1058" result="SvgjsFeMerge1058Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1059" in="SvgjsFeGaussianBlur1057Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1060" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1061" in="SourceGraphic" in2="SvgjsFeMerge1058Out" mode="normal" result="SvgjsFeBlend1061Out"></feBlend></filter></defs><line id="SvgjsLine1043" x1="134.5" y1="0" x2="134.5" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="134.5" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1062" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1063" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1066" class="apexcharts-grid"><line id="SvgjsLine1068" x1="0" y1="45" x2="135" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1067" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1047" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1048" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-line-0" d="M0 37.28571428571429C5.25 37.28571428571429 9.75 39.214285714285715 15 39.214285714285715C20.25 39.214285714285715 24.75 32.142857142857146 30 32.142857142857146C35.25 32.142857142857146 39.75 21.214285714285715 45 21.214285714285715C50.25 21.214285714285715 54.75 30.85714285714286 60 30.85714285714286C65.25 30.85714285714286 69.75 23.142857142857146 75 23.142857142857146C80.25 23.142857142857146 84.75 29.571428571428573 90 29.571428571428573C95.25 29.571428571428573 99.75 16.071428571428577 105 16.071428571428577C110.25 16.071428571428577 114.75 25.071428571428573 120 25.071428571428573C125.25 25.071428571428573 129.75 7.0714285714285765 135 7.0714285714285765C135 7.0714285714285765 135 7.0714285714285765 135 7.0714285714285765 " fill="none" fill-opacity="1" stroke="rgba(0,150,136,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMasktdbqc67v)" filter="url(#SvgjsFilter1053)" pathTo="M 0 37.28571428571429C 5.25 37.28571428571429 9.75 39.214285714285715 15 39.214285714285715C 20.25 39.214285714285715 24.75 32.142857142857146 30 32.142857142857146C 35.25 32.142857142857146 39.75 21.214285714285715 45 21.214285714285715C 50.25 21.214285714285715 54.75 30.85714285714286 60 30.85714285714286C 65.25 30.85714285714286 69.75 23.142857142857146 75 23.142857142857146C 80.25 23.142857142857146 84.75 29.571428571428573 90 29.571428571428573C 95.25 29.571428571428573 99.75 16.071428571428577 105 16.071428571428577C 110.25 16.071428571428577 114.75 25.071428571428573 120 25.071428571428573C 125.25 25.071428571428573 129.75 7.0714285714285765 135 7.0714285714285765" pathFrom="M -1 51.42857142857143L -1 51.42857142857143L 15 51.42857142857143L 30 51.42857142857143L 45 51.42857142857143L 60 51.42857142857143L 75 51.42857142857143L 90 51.42857142857143L 105 51.42857142857143L 120 51.42857142857143L 135 51.42857142857143"></path><g id="SvgjsG1049" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1074" r="0" cx="135" cy="7.0714285714285765" class="apexcharts-marker wk1wmupr5k no-pointer-events" stroke="#ffffff" fill="#009688" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1050" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1069" x1="0" y1="0" x2="135" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1070" x1="0" y1="0" x2="135" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1071" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1072" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1073" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1042" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1064" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1065" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light" style="left: 101.641px; top: 10px;"><div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 150, 136);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value">69</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 176px; height: 81px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-one">
        <div class="widget-heading">
            <h6 class="">Company Statistics</h6>
        </div>
        <div class="w-chart">
            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Accounts</p>
                    <p class="w-stats">{{ $user->count() }}</p>
                </div>
                <div class="w-chart-render-one" style="position: relative;">
                    <div id="total-users" style="min-height: 80px;"><div id="apexchartsge9n1ehsi" class="apexcharts-canvas apexchartsge9n1ehsi light" style="width: 175px; height: 80px;"><svg id="SvgjsSvg1001" width="175" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(40, 35)"><defs id="SvgjsDefs1002"><clipPath id="gridRectMaskge9n1ehsi"><rect id="SvgjsRect1007" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMaskge9n1ehsi"><rect id="SvgjsRect1008" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><filter id="SvgjsFilter1016" filterUnits="userSpaceOnUse"><feFlood id="SvgjsFeFlood1017" flood-color="#e2a03f" flood-opacity="0.7" result="SvgjsFeFlood1017Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1018" in="SvgjsFeFlood1017Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1018Out"></feComposite><feOffset id="SvgjsFeOffset1019" dx="1" dy="1" result="SvgjsFeOffset1019Out" in="SvgjsFeComposite1018Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1020" stdDeviation="2 " result="SvgjsFeGaussianBlur1020Out" in="SvgjsFeOffset1019Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1021" result="SvgjsFeMerge1021Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1022" in="SvgjsFeGaussianBlur1020Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1023" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1024" in="SourceGraphic" in2="SvgjsFeMerge1021Out" mode="normal" result="SvgjsFeBlend1024Out"></feBlend></filter></defs><line id="SvgjsLine1006" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1026" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1029" class="apexcharts-grid"><line id="SvgjsLine1031" x1="0" y1="45" x2="135" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1030" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1010" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1011" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-line-0" d="M0 31.5C5.25 31.5 9.75 39.214285714285715 15 39.214285714285715C20.25 39.214285714285715 24.75 21.857142857142858 30 21.857142857142858C35.25 21.857142857142858 39.75 37.285714285714285 45 37.285714285714285C50.25 37.285714285714285 54.75 16.714285714285715 60 16.714285714285715C65.25 16.714285714285715 69.75 28.92857142857143 75 28.92857142857143C80.25 28.92857142857143 84.75 7.071428571428569 90 7.071428571428569C95.25 7.071428571428569 99.75 18.642857142857142 105 18.642857142857142C110.25 18.642857142857142 114.75 2.5714285714285694 120 2.5714285714285694C125.25 2.5714285714285694 129.75 28.92857142857143 135 28.92857142857143C135 28.92857142857143 135 28.92857142857143 135 28.92857142857143 " fill="none" fill-opacity="1" stroke="rgba(226,160,63,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMaskge9n1ehsi)" filter="url(#SvgjsFilter1016)" pathTo="M 0 31.5C 5.25 31.5 9.75 39.214285714285715 15 39.214285714285715C 20.25 39.214285714285715 24.75 21.857142857142858 30 21.857142857142858C 35.25 21.857142857142858 39.75 37.285714285714285 45 37.285714285714285C 50.25 37.285714285714285 54.75 16.714285714285715 60 16.714285714285715C 65.25 16.714285714285715 69.75 28.92857142857143 75 28.92857142857143C 80.25 28.92857142857143 84.75 7.071428571428569 90 7.071428571428569C 95.25 7.071428571428569 99.75 18.642857142857142 105 18.642857142857142C 110.25 18.642857142857142 114.75 2.5714285714285694 120 2.5714285714285694C 125.25 2.5714285714285694 129.75 28.92857142857143 135 28.92857142857143" pathFrom="M -1 45L -1 45L 15 45L 30 45L 45 45L 60 45L 75 45L 90 45L 105 45L 120 45L 135 45"></path><g id="SvgjsG1012" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1037" r="0" cx="0" cy="0" class="apexcharts-marker w14zz0vgm no-pointer-events" stroke="#ffffff" fill="#e2a03f" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1013" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1032" x1="0" y1="0" x2="135" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1033" x1="0" y1="0" x2="135" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1034" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1035" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1036" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1005" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1027" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1028" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(226, 160, 63);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 176px; height: 81px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>

            <div class="w-chart-section">
                <div class="w-detail">
                    <p class="w-title">Admins</p>
                    <p class="w-stats">{{ $admin->count() }}</p>
                </div>
                <div class="w-chart-render-one" style="position: relative;">
                    <div id="paid-visits" style="min-height: 80px;"><div id="apexchartstdbqc67v" class="apexcharts-canvas apexchartstdbqc67v light" style="width: 175px; height: 80px;"><svg id="SvgjsSvg1038" width="175" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1040" class="apexcharts-inner apexcharts-graphical" transform="translate(40, 35)"><defs id="SvgjsDefs1039"><clipPath id="gridRectMasktdbqc67v"><rect id="SvgjsRect1044" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMasktdbqc67v"><rect id="SvgjsRect1045" width="137" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><filter id="SvgjsFilter1053" filterUnits="userSpaceOnUse"><feFlood id="SvgjsFeFlood1054" flood-color="#009688" flood-opacity="0.7" result="SvgjsFeFlood1054Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1055" in="SvgjsFeFlood1054Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1055Out"></feComposite><feOffset id="SvgjsFeOffset1056" dx="1" dy="3" result="SvgjsFeOffset1056Out" in="SvgjsFeComposite1055Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1057" stdDeviation="3 " result="SvgjsFeGaussianBlur1057Out" in="SvgjsFeOffset1056Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1058" result="SvgjsFeMerge1058Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1059" in="SvgjsFeGaussianBlur1057Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1060" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1061" in="SourceGraphic" in2="SvgjsFeMerge1058Out" mode="normal" result="SvgjsFeBlend1061Out"></feBlend></filter></defs><line id="SvgjsLine1043" x1="134.5" y1="0" x2="134.5" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="134.5" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1062" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1063" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1066" class="apexcharts-grid"><line id="SvgjsLine1068" x1="0" y1="45" x2="135" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1067" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1047" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1048" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="apexcharts-line-0" d="M0 37.28571428571429C5.25 37.28571428571429 9.75 39.214285714285715 15 39.214285714285715C20.25 39.214285714285715 24.75 32.142857142857146 30 32.142857142857146C35.25 32.142857142857146 39.75 21.214285714285715 45 21.214285714285715C50.25 21.214285714285715 54.75 30.85714285714286 60 30.85714285714286C65.25 30.85714285714286 69.75 23.142857142857146 75 23.142857142857146C80.25 23.142857142857146 84.75 29.571428571428573 90 29.571428571428573C95.25 29.571428571428573 99.75 16.071428571428577 105 16.071428571428577C110.25 16.071428571428577 114.75 25.071428571428573 120 25.071428571428573C125.25 25.071428571428573 129.75 7.0714285714285765 135 7.0714285714285765C135 7.0714285714285765 135 7.0714285714285765 135 7.0714285714285765 " fill="none" fill-opacity="1" stroke="rgba(0,150,136,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMasktdbqc67v)" filter="url(#SvgjsFilter1053)" pathTo="M 0 37.28571428571429C 5.25 37.28571428571429 9.75 39.214285714285715 15 39.214285714285715C 20.25 39.214285714285715 24.75 32.142857142857146 30 32.142857142857146C 35.25 32.142857142857146 39.75 21.214285714285715 45 21.214285714285715C 50.25 21.214285714285715 54.75 30.85714285714286 60 30.85714285714286C 65.25 30.85714285714286 69.75 23.142857142857146 75 23.142857142857146C 80.25 23.142857142857146 84.75 29.571428571428573 90 29.571428571428573C 95.25 29.571428571428573 99.75 16.071428571428577 105 16.071428571428577C 110.25 16.071428571428577 114.75 25.071428571428573 120 25.071428571428573C 125.25 25.071428571428573 129.75 7.0714285714285765 135 7.0714285714285765" pathFrom="M -1 51.42857142857143L -1 51.42857142857143L 15 51.42857142857143L 30 51.42857142857143L 45 51.42857142857143L 60 51.42857142857143L 75 51.42857142857143L 90 51.42857142857143L 105 51.42857142857143L 120 51.42857142857143L 135 51.42857142857143"></path><g id="SvgjsG1049" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1074" r="0" cx="135" cy="7.0714285714285765" class="apexcharts-marker wk1wmupr5k no-pointer-events" stroke="#ffffff" fill="#009688" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1050" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1069" x1="0" y1="0" x2="135" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1070" x1="0" y1="0" x2="135" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1071" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1072" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1073" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1042" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1064" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1065" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip light" style="left: 101.641px; top: 10px;"><div class="apexcharts-tooltip-series-group active" style="display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 150, 136);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value">69</span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 176px; height: 81px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>
        </div>
    </div>
</div>
 



<div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-activity-three">

        <div class="widget-heading">
            <h5 class="">Notifications</h5>
        </div>

        <div class="widget-content">

            <div class="mt-container mx-auto ps ps--active-y">
                <div class="timeline-line">
                    
                    <div class="item-timeline timeline-new">
                        <div class="t-dot" data-original-title="" title="">
                            <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                        </div>
                      
                        <div class="t-content">
                            <div class="t-uppercontent"> 
                                <h5>Tickets</h5>
                                @foreach($ticketLatest as $tix)
                             
                                <span class="">{{   date('F j, Y, g:i a', strtotime($tix->created_at)) }}</span>
                               
                            </div>
                            <p><span>Latest</span> Ticket Log</p>
                            <div class="tags">
                                <div class="badge badge-info">ID: {{ $tix->id }}</div>
                                <div class="badge">{!! $tix->TicketStatus !!}</div>
                                <div class="badge badge-success">{{ $tix->ticketuser->name }}</div>
                                <div class="badge badge-warning">{{ $tix->eqticket->item_name }}</div>
                                @endforeach
                            </div>
                        </div>
                      
                    </div>

                    <div class="item-timeline timeline-new">
                        <div class="t-dot" data-original-title="" title="">
                            <div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>Maintenance Staff Metrics</h5>
                                @foreach($maintenance as $m)
                              
                            </div>
                           
                            <div class="tags">
                                <div class="badge badge-info">{{ $m->serviceUser->name }}</div>
                                <div class="badge">{!! $m->serviceTicket->TicketStatus !!}</div>
                
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="item-timeline timeline-new">
                        <div class="t-dot" data-original-title="" title="">
                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>Task Completed</h5>
                                <span class="">01 Mar, 2020</span>
                            </div>
                            <p>Backup <span>Files EOD</span></p>
                            <div class="tags">
                                <div class="badge badge-primary">Backup</div>
                                <div class="badge badge-success">EOD</div>
                            </div>
                        </div>
                    </div>

                    <div class="item-timeline timeline-new">
                        <div class="t-dot" data-original-title="" title="">
                            <div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>Purchase Request log</h5>
                               
                            </div>
                            <p>{{ $purchase->count() }} Printed Documents</p>
                            <div class="tags">
                                <div class="badge badge-success"></div>
                                <div class="badge badge-warning">Docs</div>
                            </div>
                        </div>
                    </div>

                    <div class="item-timeline timeline-new">
                        <div class="t-dot" data-original-title="" title="">
                            <div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg></div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>Reboot</h5>
                                <span class="">06 Apr, 2020</span>
                            </div>
                            <p>Server rebooted successfully</p>
                            <div class="tags">
                                <div class="badge badge-warning">Reboot</div>
                                <div class="badge badge-primary">Server</div>
                            </div>
                        </div>
                    </div>                                      
                </div>                                    
            <div class="ps__rail-x" style="left: 0px; bottom: -200px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 200px; height: 325px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 119px; height: 192px;"></div></div></div>
        </div>
    </div>
</div>
  

@endsection
@push('styles')
<link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css">
@endpush
