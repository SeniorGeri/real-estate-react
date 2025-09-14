import { useState } from "react";
import { MapContainer, TileLayer, Marker, useMapEvents } from "react-leaflet";
import L from "leaflet";

// Fix marker icon issue
delete (L.Icon.Default.prototype as any)._getIconUrl;
L.Icon.Default.mergeOptions({
  iconRetinaUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon-2x.png",
  iconUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png",
  shadowUrl: "https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png",
});

function LocationMarker({
  initialLat,
  initialLng,
  onChange,
}: {
  initialLat: number;
  initialLng: number;
  onChange: (lat: number, lng: number) => void;
}) {
  const [position, setPosition] = useState<L.LatLng | null>(
    initialLat && initialLng ? new L.LatLng(initialLat, initialLng) : null
  );

  useMapEvents({
    click(e) {
      setPosition(e.latlng);
      onChange(e.latlng.lat, e.latlng.lng);
    },
  });

  return position === null ? null : <Marker position={position} />;
}

export default function MapPicker({
  initialLat = 41.3275, // Tirana default
  initialLng = 19.8189,
  onChange,
}: {
  initialLat?: number;
  initialLng?: number;
  onChange: (lat: number, lng: number) => void;
}) {
  return (
    <MapContainer
      center={[initialLat, initialLng]}
      zoom={13}
      style={{ height: "400px", width: "100%" }}
    >
      <TileLayer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        attribution="© OpenStreetMap contributors"
      />
      <LocationMarker initialLat={initialLat} initialLng={initialLng} onChange={onChange} />
    </MapContainer>
  );
}
