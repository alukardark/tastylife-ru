if (!window.BX_YMapAddPlacemark)
{
	var checkMap = 0;
	var mapId = 0;
	window.BX_YMapAddPlacemark = function(map, arPlacemark)
	{
		if (mapId === 0 || mapId != map['_jb'][1]) {
			checkMap=0;
			mapId = map['_jb'][1];
		} else {
			checkMap++;
		}




		if (null == map)
			return false;

		if(!arPlacemark.LAT || !arPlacemark.LON)
			return false;

		var props = {};
		if (null != arPlacemark.TEXT && arPlacemark.TEXT.length > 0)
		{
			var value_view = '';

			if (arPlacemark.TEXT.length > 0)
			{
				var rnpos = arPlacemark.TEXT.indexOf("\n");
				value_view = rnpos <= 0 ? arPlacemark.TEXT : arPlacemark.TEXT.substring(0, rnpos);
			}

			props.balloonContent = arPlacemark.TEXT.replace(/\n/g, '<br />');
			props.hintContent = value_view;
		}

		if(checkMap==0){
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/1.png" 
						}
					);
		}else if(checkMap==1){
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/2.png" 
						}
					);
		}else if(checkMap==2){
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/3.png" 
						}
					);
		}else if(checkMap==3){
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/4.png" 
						}
					);
		}else if(checkMap==4){
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/5.png" 
						}
					);
		}else{
			var obPlacemark = new ymaps.Placemark(
						[arPlacemark.LAT, arPlacemark.LON],
						props,
						{
							balloonCloseButton: true,
							iconImageSize: [53,55],
							iconImageHref:"/bitrix/images/icons/1.png" 
						}
					);
		}

		map.geoObjects.add(obPlacemark);

		return obPlacemark;
	}
}

if (!window.BX_YMapAddPolyline)
{
	window.BX_YMapAddPolyline = function(map, arPolyline)
	{
		if (null == map)
			return false;

		if (null != arPolyline.POINTS && arPolyline.POINTS.length > 1)
		{
			var arPoints = [];
			for (var i = 0, len = arPolyline.POINTS.length; i < len; i++)
			{
				arPoints.push([arPolyline.POINTS[i].LAT, arPolyline.POINTS[i].LON]);
			}
		}
		else
		{
			return false;
		}

		var obParams = {clickable: true};
		if (null != arPolyline.STYLE)
		{
			obParams.strokeColor = arPolyline.STYLE.strokeColor;
			obParams.strokeWidth = arPolyline.STYLE.strokeWidth;
		}
		var obPolyline = new ymaps.Polyline(
			arPoints, {balloonContent: arPolyline.TITLE}, obParams
		);

		map.geoObjects.add(obPolyline);

		return obPolyline;
	}
}