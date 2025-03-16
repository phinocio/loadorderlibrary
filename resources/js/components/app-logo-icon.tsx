import { SVGAttributes } from 'react';

export default function AppLogoIcon(props: SVGAttributes<SVGElement>) {
    return (
        <svg
            {...props}
            aria-label="Load Order Library Logo"
            width="224"
            height="176"
            viewBox="0 0 224 176"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M0 0H32V176H0V0Z" fill="#22c55e" />
            <path d="M20 144H96V176H20V144Z" fill="#22c55e" />
            <path d="M112 0H144V176H112V0Z" fill="#22c55e" />
            <path d="M192 0H224V176H192V0Z" fill="#22c55e" />
            <path d="M123 144H211V176H123V144Z" fill="#22c55e" />
            <path d="M123 0H209V32H123V0Z" fill="#22c55e" />
        </svg>
    );
}
