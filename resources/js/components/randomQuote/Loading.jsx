import React from 'react';
import Source from './Source.jsx';

export default function Loading({ loading, source }) {
    if (!loading) {
        return (null);
    }

    return (
        <div className="mb-6">
            <Source source={source} />
            <p>Loading ...</p>
        </div>
    );
}