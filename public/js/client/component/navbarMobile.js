const dashboardArea=document.querySelector(".dashboard-area")
function handelDisplayDashboardMobile() {
    dashboardArea.classList.toggle('active')
}
function handelDisplayNoneDashboardMobile() {
    dashboardArea.classList.remove('active')
}