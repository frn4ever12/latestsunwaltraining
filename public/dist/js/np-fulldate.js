
function getArthikBarsha(dateString) {
    const date = new Date(dateString);

    const year = date.getFullYear();
    const nextYear = year + 1;
    const formattedDate = `${year}/${nextYear.toString().slice(-2)}`;
    return formattedDate;
}

function convertToFullDate(inputDate) {
    return NepaliFunctions.BS.GetFullDate(inputDate, true, "YYYY-MM-DD");
}
function convertToFullDay(inputDate) {
    return NepaliFunctions.BS.GetFullDayInUnicode(inputDate, true, "YYYY-MM-DD");
}
function getTodayDate() {
    const { year, month, day } = NepaliFunctions.BS.GetCurrentDate();
    return year + "-" + month + "-" + day;
}
