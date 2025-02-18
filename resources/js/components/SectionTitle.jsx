import React from 'react';

export default function SectionTitle({ title }) {
    if (!title) {
        return (null);
    }

    return (
        <div className="px-10 mb-4 bg-linear-to-r from-cyan-500 to-blue-500">
            <p className="font-bold text-lg text-white">{title}</p>
        </div>
    );
}